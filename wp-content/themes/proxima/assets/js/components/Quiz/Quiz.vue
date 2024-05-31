<template>
    <vp-modal v-show="isOpen">
        <template #header>
            <div class="vp-modal--header" v-show="step < 5">
                <h2 class="vp-modal--title" v-show="step === 0">
                    Initial Onboarding Questionnaire
                </h2>
                <transition>
                    <div class="vp-modal--steps" v-show="step !== 0 && step < 5">
                        <div class="vp-modal--step" :class="{active: step === 1, passed: step > 1}">01</div>
                        <div class="vp-modal--step-line"></div>
                        <div class="vp-modal--step" :class="{active: step === 2, passed: step > 2}">02</div>
                        <div class="vp-modal--step-line"></div>
                        <div class="vp-modal--step" :class="{active: step === 3, passed: step > 3}">03</div>
                        <div class="vp-modal--step-line"></div>
                        <div class="vp-modal--step" :class="{active: step === 4, passed: step > 4}">04</div>
                    </div>
                </transition>
                <div class="vp-modal--close" @click="close" v-show="step !== 0">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 5L5 15M5 5L15 15" stroke="currentColor" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </template>
        <template #body>
            <transition>
                <div class="vp-modal--body" v-show="step === 0">
                    <p class="vp-modal--subtitle">
                        We want to ensure we provide you with a tailor made and efficient service.
                        Please take the following 1 minute to provide us with necessary information. One of our advisors
                        will be in
                        touch with you within 24 hours.
                        Confidentiality and trust are at the core of our values. No information will be shared with
                        third parties.
                    </p>

                    <div class="vp-modal--terms">
                        <label class="vp-checkbox">
                            <input type="checkbox" v-model="quiz.terms">
                            <span class="vp-checkbox--box"></span>
                            <span class="vp-checkbox--text">
            I agree to the
            <a :href="terms" target="_blank">Terms and Conditions </a>
            <b>and </b>
            <a :href="privacy" target="_blank">Privacy Policy</a>
          </span>
                        </label>

                        <div class="vp-error--msg" v-if="v$.quiz.terms.$error">{{ msg.terms }}</div>
                    </div>
                    <div class="vp-modal--navigation">
                        <vp-button @click="submitStep">
                            <span class="vp-btn--text">Press to start</span>
                            <vp-icon type="arrow-next"></vp-icon>
                        </vp-button>
                    </div>
                </div>
            </transition>

            <transition>
                <div class="vp-modal--body" v-show="step === 1">
                    <div class="vp-modal--group">
                        <input class="vp-input"
                               :class="{'vp-input--error': v$.quiz.firstName.$error}"
                               type="text"
                               v-model="quiz.firstName"
                               placeholder="First Name">
                        <div class="vp-error--msg" v-if="v$.quiz.firstName.$error">{{ msg.firstName }}</div>
                    </div>
                    <div class="vp-modal--group">
                        <input class="vp-input"
                               :class="{'vp-input--error': v$.quiz.lastName.$error}"
                               type="text"
                               v-model="quiz.lastName"
                               placeholder="Last Name">
                        <div class="vp-error--msg" v-if="v$.quiz.lastName.$error">{{ msg.lastName }}</div>
                    </div>
                    <div class="vp-modal--group">
                        <input class="vp-input"
                               :class="{'vp-input--error': v$.quiz.email.$error}"
                               type="text"
                               v-model="quiz.email"
                               placeholder="Email">
                        <div class="vp-error--msg" v-if="v$.quiz.email.$error">{{ msg.email }}</div>
                    </div>
                    <div class="vp-modal--group">
                        <div class="vp-form--block">
                            <div class="vp-input--group">
                                <div class="vp-input--preview">
                                    <vp-dropdown
                                        :class="{'vp-input--error': v$.quiz.phone.$error}"
                                        :list="code"
                                        @select="select"></vp-dropdown>
                                </div>
                                <vp-mask class="vp-input"
                                         name="phone"
                                         :class="{'vp-input--error': v$.quiz.phone.$error}"
                                         v-model="quiz.phone" :mask="selected.mask"
                                         :placeholder="selected.placeholder"/>
                            </div>
                            <div class="vp-error--msg" v-if="v$.quiz.phone.$error">{{ msg.phone }}</div>
                        </div>
                    </div>

                    <div class="vp-modal--block" :class="{'vp-input--error': v$.quiz.videoCall.$error}">
                        <div class="vp-modal--block-label">
                            Would you like to schedule a complimentary video call with an allocated advisor?
                        </div>
                        <div class="vp-modal--block-container">
                            <label class="vp-radio">
                                <input type="radio" value="Yes" name="videoCall" v-model="quiz.videoCall">
                                <span class="vp-radio--box"></span>
                                <span class="vp-radio--text">Yes</span>
                            </label>
                            <label class="vp-radio">
                                <input type="radio" value="No" name="videoCall" v-model="quiz.videoCall">
                                <span class="vp-radio--box"></span>
                                <span class="vp-radio--text">No</span>
                            </label>
                        </div>

                        <div class="vp-error--msg" v-if="v$.quiz.videoCall.$error">{{ msg.videoCall }}</div>
                    </div>

                    <div class="vp-modal--block" :class="{'vp-input--error': v$.quiz.whatsAppCall.$error}">
                        <div class="vp-modal--block-label">
                            May we contact you via WhatsApp?
                        </div>
                        <div class="vp-modal--block-container">
                            <label class="vp-radio">
                                <input type="radio" value="Yes" name="whatsAppCall" v-model="quiz.whatsAppCall">
                                <span class="vp-radio--box"></span>
                                <span class="vp-radio--text">Yes</span>
                            </label>
                            <label class="vp-radio">
                                <input type="radio" value="No" name="whatsAppCall" v-model="quiz.whatsAppCall">
                                <span class="vp-radio--box"></span>
                                <span class="vp-radio--text">No</span>
                            </label>
                        </div>

                        <div class="vp-error--msg" v-if="v$.quiz.whatsAppCall.$error">{{ msg.whatsAppCall }}</div>
                    </div>

                    <div class="vp-modal--navigation">
<!--                        <vp-button btn-class="vp-btn&#45;&#45;simple" @click="stepBack">-->
<!--                            <vp-icon type="arrow-prev"></vp-icon>-->
<!--                            <span class="vp-btn&#45;&#45;text">Go Back</span>-->
<!--                        </vp-button>-->
                        <vp-button @click="submitStep">
                            <span class="vp-btn--text">Next Step</span>
                            <vp-icon type="arrow-next"></vp-icon>
                        </vp-button>
                    </div>
                </div>
            </transition>

            <transition>
                <div class="vp-modal--body" v-show="step === 2">
                    <div class="vp-modal--group">
              <textarea class="vp-textarea"
                        v-model="quiz.message"
                        :class="{'vp-textarea--error': v$.quiz.message.$error}"
                        placeholder="Family composition of the applicants including age?"></textarea>

                        <div class="vp-error--msg" v-if="v$.quiz.message.$error">{{ msg.message }}</div>
                    </div>

                    <div class="vp-modal--group">
                        <div class="vp-input--group">
                            <div class="vp-input--preview">
                                <vp-dropdown
                                    :class="{'vp-input--error': v$.quiz.timelineCity.$error}"
                                    :list="timeline"
                                    @select="selectTimeline"></vp-dropdown>
                            </div>
                            <input class="vp-input"
                                   type="text"
                                   disabled
                                   :class="{'vp-input--error': v$.quiz.timelineCity.$error}"
                                   v-model="quiz.timelineCity"
                                   :placeholder="selectedTimeline.mask">
                        </div>

                        <div class="vp-error--msg" v-if="v$.quiz.timelineCity.$error">{{ msg.timelineCity }}</div>
                    </div>

                    <div class="vp-modal--label">
                        What is the motivation behind obtaining the Portuguese Golden
                        <span>* Choose one or more options</span>
                    </div>

                    <div class="vp-modal--group" v-for="item in fields.motivation">
                        <label class="vp-checkbox">
                            <input type="checkbox"
                                   :value="item"
                                   v-model="quiz.motivation">
                            <span class="vp-checkbox--box"></span>
                            <span class="vp-checkbox--text">{{ item }}</span>
                        </label>

                    </div>

                    <div class="vp-error--msg" v-if="v$.quiz.motivation.$error">{{ msg.motivation }}</div>

                    <div class="vp-modal--navigation">
                        <vp-button btn-class="vp-btn--simple" @click="stepBack">
                            <vp-icon type="arrow-prev"></vp-icon>
                            <span class="vp-btn--text">Go Back</span>
                        </vp-button>
                        <vp-button @click="submitStep">
                            <span class="vp-btn--text">Next Step</span>
                            <vp-icon type="arrow-next"></vp-icon>
                        </vp-button>
                    </div>
                </div>
            </transition>

            <transition>
                <div class="vp-modal--body" v-show="step === 3">
                    <div class="vp-modal--label">
                        What are your objectives in regards to the investment vehicle chosen?
                        <span>*Up to two responses</span>
                    </div>
                    <div class="vp-modal--group" v-for="item in fields.objectives">
                        <label class="vp-checkbox">
                            <input type="checkbox"
                                   :value="item"
                                   v-model="quiz.objectives">
                            <span class="vp-checkbox--box"></span>
                            <span class="vp-checkbox--text">{{ item }}</span>
                        </label>
                    </div>
                    <div class="vp-error--msg" v-if="v$.quiz.objectives.$error">{{ msg.objectives }}</div>

                    <div class="vp-modal--label">
                        How would you describe your risk profile?
                    </div>
                    <div class="vp-modal--group" v-for="item in fields.risk">
                        <label class="vp-radio">
                            <input type="radio" :value="item" name="risk" v-model="quiz.risk">
                            <span class="vp-radio--box"></span>
                            <span class="vp-radio--text">{{ item }}</span>
                        </label>
                    </div>
                    <div class="vp-error--msg" v-if="v$.quiz.risk.$error">{{ msg.risk }}</div>

                    <div class="vp-modal--label">
                        Preferred type of investment?
                        <span>* Up to two responses</span>
                    </div>

                    <div class="vp-modal--group" v-for="item in fields.investment">
                        <label class="vp-checkbox" :class="{
                            'vp-disabled': quiz.investment.length >= 2 && quiz.investment.indexOf(item) === -1
                        }">
                            <input type="checkbox"
                                   :value="item"
                                   :disabled="quiz.investment.length >= 2 && quiz.investment.indexOf(item) === -1"
                                   v-model="quiz.investment">
                            <span class="vp-checkbox--box"></span>
                            <span class="vp-checkbox--text">{{ item }}</span>
                        </label>
                    </div>
                    <div class="vp-error--msg" v-if="v$.quiz.investment.$error">{{ msg.investment }}</div>

                    <div class="vp-modal--navigation">
                        <vp-button btn-class="vp-btn--simple" @click="stepBack">
                            <vp-icon type="arrow-prev"></vp-icon>
                            <span class="vp-btn--text">Go Back</span>
                        </vp-button>
                        <vp-button @click="submitStep">
                            <span class="vp-btn--text">Next Step</span>
                            <vp-icon type="arrow-next"></vp-icon>
                        </vp-button>
                    </div>
                </div>
            </transition>

            <transition>
                <div class="vp-modal--body" v-show="step === 4">
                    <div class="vp-modal--block" :class="{'vp-input--error': v$.quiz.capability.$error}">
                        <div class="vp-modal--block-label">
                            Do you have financial capability to support investment vehicles
                            at €500,000?
                        </div>
                        <div class="vp-modal--block-container">
                            <label class="vp-radio">
                                <input type="radio" value="Yes" name="capability" v-model="quiz.capability">
                                <span class="vp-radio--box"></span>
                                <span class="vp-radio--text">Yes</span>
                            </label>
                            <label class="vp-radio">
                                <input type="radio" value="No" name="capability" v-model="quiz.capability">
                                <span class="vp-radio--box"></span>
                                <span class="vp-radio--text">No</span>
                            </label>
                        </div>

                        <div class="vp-error--msg" v-if="v$.quiz.capability.$error">{{ msg.capability }}</div>
                    </div>

                    <div class="vp-modal--label">
                        Are you planning on relocating to Portugal?
                    </div>
                    <div class="vp-modal--group" v-for="item in fields.relocating">
                        <label class="vp-radio">
                            <input type="radio" name="relocating" :value="item" v-model="quiz.relocating">
                            <span class="vp-radio--box"></span>
                            <span class="vp-radio--text">{{ item }}</span>
                        </label>
                    </div>
                    <div class="vp-error--msg" v-if="v$.quiz.relocating.$error">{{ msg.relocating }}</div>

                    <div class="vp-modal--label">
                        Time frame to investment?
                    </div>
                    <div class="vp-modal--group" v-for="item in fields.frameToInvestment">
                        <label class="vp-radio">
                            <input type="radio" name="frameToInvestment" :value="item" v-model="quiz.frameToInvestment">
                            <span class="vp-radio--box"></span>
                            <span class="vp-radio--text">{{ item }}</span>
                        </label>
                    </div>
                    <div class="vp-error--msg" v-if="v$.quiz.frameToInvestment.$error">{{ msg.frameToInvestment }}</div>

                    <div class="vp-modal--navigation">
                        <vp-button btn-class="vp-btn--simple" @click="stepBack">
                            <vp-icon type="arrow-prev"></vp-icon>
                            <span class="vp-btn--text">Go Back</span>
                        </vp-button>
                        <vp-button @click="submitStep">
                            <span class="vp-btn--text">Next Step</span>
                            <vp-icon type="arrow-next"></vp-icon>
                        </vp-button>
                    </div>
                </div>
            </transition>

            <transition>
                <div class="vp-modal--body" v-show="step === 5">
                    <h2 class="vp-modal--heading">
                        Thank you!
                    </h2>

                    <div class="vp-modal--text">
                        One of our advisors will be in touch with you within 24 hours.<br>
                        Please be attentive to your e-mail.
                    </div>

                    <div class="vp-modal--navigation">
                        <vp-button @click="submit">
                            <span class="vp-btn--text">Continue</span>
                            <vp-icon type="arrow-next"></vp-icon>
                        </vp-button>
                    </div>
                </div>
            </transition>
        </template>
    </vp-modal>
</template>

<script>
import {useVuelidate} from '@vuelidate/core'
import {required, email} from '@vuelidate/validators'

const isChecked = (value) => {
    return value !== false
}
export default {
    setup() {
        return {v$: useVuelidate()}
    },
    name: "Quiz",
    props: ['isOpen', 'terms', 'privacy'],
    data() {
        return {
            step: 0,
            selected: false,
            selectedTimeline: false,
            code: window.VpPhoneCode,
            timeline: window.VpTimeline,
            fields: window.VpFormFields,
            quiz: {
                terms: false,
                firstName: '',
                lastName: '',
                email: '',
                phone: '',
                phoneCode: '',
                videoCall: '',
                whatsAppCall: '',
                message: '',
                timelineCode: '',
                timelineCity: '',
                motivation: [],
                objectives: [],
                risk: '',
                investment: [],
                capability: '',
                relocating: '',
                frameToInvestment: '',
            },
            msg: window.VpErrorMsg
        }
    },
    validations() {
        return {
            quiz: {
                terms: {isChecked},
                firstName: {required},
                lastName: {required},
                email: {required, email},
                phone: {required},
                videoCall: {required},
                whatsAppCall: {required},
                message: {required},
                timelineCity: {required},
                motivation: {required},
                objectives: {required},
                risk: {required},
                investment: {required},
                capability: {required},
                relocating: {required},
                frameToInvestment: {required},
            },
            $validationGroups: {
                step_0: ['quiz.terms'],
                step_1: ['quiz.firstName', 'quiz.lastName', 'quiz.email', 'quiz.phone', 'quiz.videoCall', 'quiz.whatsAppCall'],
                step_2: ['quiz.message', 'quiz.timelineCity', 'quiz.motivation'],
                step_3: ['quiz.objectives', 'quiz.risk', 'quiz.investment'],
                step_4: ['quiz.capability', 'quiz.relocating', 'quiz.frameToInvestment'],
            }
        }
    },
    mounted() {
        let self = this;
        document.body.addEventListener('clear', function (){
            self.resetForm()
        })
    },
    methods: {
        resetForm() {
            Object.keys(window.defaultFields).forEach(item => {
                this.quiz[item] = window.defaultFields[item]
            });
            let phone = document.querySelector('.vp-modal--body .vp-input[name="phone"]')
            phone.value = ''
            this.step = 0
        },
        close() {
            this.$emit('close', this.quiz)
        },
        select(e) {
            this.selected = e
            this.quiz.phoneCode = e.value
        },
        selectTimeline(e) {
            this.selectedTimeline = e
            this.quiz.timelineCode = e.value
            this.quiz.timelineCity = e.mask
        },
        stepBack() {
            this.step--
        },
        submitStep() {
            let self = this
            if (this.v$.$validationGroups['step_' + this.step]) {
                if (!this.v$.$validationGroups['step_' + this.step].$invalid) {
                    if(this.step > 0){
                        this.sendForm(true)
                    }

                    this.step++;
                    this.v$.$reset()
                } else {
                    this.v$.$touch()

                    setTimeout(function () {
                        self.v$.$reset()
                    }, 2000)
                }
            } else {
                this.step++;
                this.v$.$reset()
            }
        },
        async submit() {
            this.close()
            this.sendForm()
            this.step = 0
        },
        sendForm(e) {
            this.$emit('send-form', this.quiz, e)
        }
    }
}
</script>

<style scoped>

</style>