import {createApp} from 'vue'
import Components from "./components";
import verticalAnimation from "./verticalAnimation";
import Codes from "./codes.json";
import Gmt from "./gmt.json";
const countryCodes = require('country-codes-list')
const myCountryCodesObject = countryCodes.customList('countryCode',
    '+({countryCallingCode})'
)
const myCountryNamesObject = countryCodes.customList('countryCode',
    '{countryNameEn}'
)
let vp_codes = []

Object.keys(myCountryCodesObject).forEach(item => {
    if(Codes[item]){
        vp_codes.push({
            mask: Codes[item],
            value: myCountryCodesObject[item],
            name: myCountryNamesObject[item],
            placeholder: Codes[item],
            countryCode: item,
            icon: `https://purecatamphetamine.github.io/country-flag-icons/3x2/${item}.svg`,
        })
    }
})
vp_codes.sort(function(a, b){
    let nameA=a.name.toLowerCase(), nameB=b.name.toLowerCase()
    if (nameA < nameB)
        return -1
    if (nameA > nameB)
        return 1
    return 0
})

window.VpPhoneCode = vp_codes
window.VpTimeline = Gmt


import 'swiper/css/effect-fade';

//import '../scss/main.scss';
import 'custom-vue-scrollbar/dist/style.css';
import {Autoplay, Navigation, Pagination} from 'swiper/modules';
import {useVuelidate} from '@vuelidate/core'
import axios from 'axios'
import {required, email} from '@vuelidate/validators'
import stepAnimation from "./stepAnimation";

window.defaultFields = {
    terms: false,
    firstName: '',
    lastName: '',
    email: '',
    phone: '',
    videoCall: '',
    whatsAppCall: '',
    message: '',
    motivation: [],
    objectives: [],
    risk: '',
    investment: [],
    capability: '',
    relocating: '',
    frameToInvestment: '',
}

createApp({
    delimiters: ['${', '}'],
    setup() {
        return {v$: useVuelidate()}
    },
    data() {
        return {
            color: false,
            isMenu: false,
            fields: window.VpFormFields,
            msg: window.VpErrorMsg,
            form: {
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
            topBtnActive: false,
            isQuizOpen: true,
            isBadgeActive: false,
            isSlideChange: true,
            swiperAutoplaySpeed: 9000,
            modal: {
                isModal: false,
                id: false,
            },
            modules: [Autoplay, Navigation, Pagination],
            selected: false,
            selectedTimeline: false,
            code: window.VpPhoneCode,
            timeline: window.VpTimeline,
            helloActiveSlide: '0',
            helloSlider: false,
            showClipBoardNotice: false,
            isShowMore: false,
        }
    },
    validations() {
        return {
            form: {
                firstName: {required},
                lastName: {required},
                email: {required, email},
                phone: {required},
                capability: {required},
                frameToInvestment: {required},
                relocating: {required},
                investment: {required},
            },
        }
    },
    mounted() {
        let self = this;

        const preloader = document.querySelector('.vp-preloader')
        const header = document.querySelector('.vp-header')
        const progress = document.querySelectorAll('[data-progress-container]')
        let setupScrollSettings = function () {
            if (window.scrollY > 50) {
                header.classList.add('fixed')
            } else {
                header.classList.remove('fixed')
            }

            if (window.innerWidth > 1024) {
                if (window.scrollY > 50) {
                    self.topBtnActive = true
                } else {
                    self.topBtnActive = false
                }
            } else {
                if (window.scrollY > document.body.offsetHeight - document.body.offsetHeight * .1) {
                    self.topBtnActive = true
                } else {
                    self.topBtnActive = false
                }
            }
        }
        //
        // let touchstartY = 0
        // let touchendY = 0
        //
        // function checkDirection() {
        //     if (touchendY < touchstartY) {
        //         header.classList.remove('hide-header')
        //     }
        //     if (touchendY > touchstartY) {
        //         header.classList.add('hide-header')
        //     }
        // }
        //
        // document.addEventListener('touchstart', e => {
        //     touchstartY = window.scrollY
        // })
        //
        // document.addEventListener('touchend', e => {
        //     touchendY = window.scrollY
        //     checkDirection()
        // })
        //
        // document.addEventListener('touchmove', e => {
        //     touchendY = window.scrollY
        //     checkDirection()
        //     touchstartY = window.scrollY
        // })

        let lastScrollTop = 0;

        window.addEventListener("scroll", function () {
            let scrollTop = window.scrollY || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                header.classList.add('hide-header')
            } else if (scrollTop < lastScrollTop) {
                header.classList.remove('hide-header')
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }, false);

        
        preloader.classList.add('page-load')

        setupScrollSettings()

        window.addEventListener('scroll', function (e) {
            setupScrollSettings()

            progress.forEach(item => {
                if (item && item.getBoundingClientRect().y < 150) {
                    let height = item.getBoundingClientRect().height - window.innerHeight + 240
                    let oy = Math.abs(item.getBoundingClientRect().y - 150)
                    if (100 / height * oy <= 100) {
                        item.parentNode.style.setProperty('--progress', `${100 / height * oy}%`);
                    } else {
                        item.parentNode.style.setProperty('--progress', '100%');
                    }
                } else {
                    item.parentNode.style.setProperty('--progress', '0%');
                }
            })
        })

        document.addEventListener('wheel', (e) => {
            if (e.wheelDeltaY < 0) {
                header.classList.add('hide-header')
            } else {
                header.classList.remove('hide-header')
            }
        })


        verticalAnimation()
        stepAnimation()
    },
    computed: {},
    methods: {
        showMore() {
            this.isShowMore = true
        },
        copyToClipBoard(e) {
            let self = this;
            navigator.clipboard.writeText(e);
            self.showClipBoardNotice = true

            setTimeout(function () {
                self.showClipBoardNotice = false
            }, 2000)
        },
        getRef(e) {
            this.helloSlider = e
        },
        onHelloSlideChange(e) {
            this.helloActiveSlide = e.activeIndex
        },
        setHelloSlide(e) {
            this.helloActiveSlide = e
            this.helloSlider.slideTo(e)
        },
        select(e) {
            this.selected = e
        },
        selectTimeline(e) {
            this.selectedTimeline = e
        },
        onSlideChange() {
            let self = this;

            setTimeout(function () {
                self.isSlideChange = true
            }, 300)
        },
        goToTop() {
            window.scrollTo({top: 0, behavior: 'smooth'});
        },
        start() {
            this.isSlideChange = false
        },
        toggleMenu() {
            this.isMenu = !this.isMenu
        },
        showMenu() {
            this.isMenu = true
        },
        hideMenu() {
            this.isMenu = false
        },
        async checkValidation() {
            let self = this;
        },
        submit() {
            let self = this;

            this.sendForm(this.form)
        },
        serialize(form) {
            let result = []

            // 1 step start
            if (form.email) {
                result.push(
                    {
                        name: "email",
                        value: form.email
                    },
                )
            }
            if (form.firstName) {
                result.push(
                    {
                        name: "firstname",
                        value: form.firstName
                    },
                )
            }
            if (form.lastName) {
                result.push(
                    {
                        name: "lastname",
                        value: form.lastName
                    },
                )
            }
            if (form.phone) {
                result.push(
                    {
                        name: "phone",
                        value: form.phone
                    },
                )
            }
            if (form.videoCall) {
                result.push(
                    {
                        name: "video_call",
                        value: form.videoCall
                    },
                )
            }
            if (form.whatsAppCall) {
                result.push(
                    {
                        name: "via_whatsapp",
                        value: form.whatsAppCall
                    },
                )
            }
            // 1 step end

            let rest = ''

            // 2 step start
            if (form.message) {
                rest += 'Family composition of the applicants including age? - '
                rest += form.message
                rest += '\n'
            }
            if (form.timelineCode) {
                rest += 'Time zone - ';
                rest += form.timelineCode
                rest += ' ';
                rest += form.timelineCity
                rest += '\n'
            }
            if (form.motivation && form.motivation.length > 0) {
                rest += '\n'
                rest += 'What is the motivation behind obtaining the Portuguese Golden Visa: ';
                rest += '\n'
                form.motivation.forEach(item => {
                    rest += ' - '
                    rest += item
                    rest += '\n'
                })
                rest += '\n'
            }
            // 2 step end


            // 3 step start
            if (form.objectives && form.objectives.length > 0) {
                rest += '\n'
                rest += 'What are your objectives in regards to the investment vehicle chosen: '
                rest += '\n'
                form.objectives.forEach(item => {
                    rest += ' - '
                    rest += item
                    rest += '\n'
                })
                rest += '\n'
            }
            if (form.risk) {
                rest += 'How would you describe your risk profile? - '
                rest += form.risk
                rest += '\n'
            }
            if (form.investment && form.investment.length > 0) {
                rest += '\n'
                rest += 'Preferred type of investment? - '
                rest += '\n'
                form.investment.forEach(item => {
                    rest += ' - '
                    rest += item
                    rest += '\n'
                })
                rest += '\n'
                rest += '\n'
            }
            // 3 step end


            // 4 step start
            if (form.capability) {
                rest += 'Do you have financial capability to support investment vehicles at €500,000? - '
                rest += form.capability
                rest += '\n'
                rest += '\n'
            }
            if (form.relocating) {
                rest += 'Are you planning on relocating to Portugal? - '
                rest += form.relocating
                rest += '\n'
                rest += '\n'
            }
            if (form.frameToInvestment) {
                rest += 'Time frame to investment? - '
                rest += form.frameToInvestment
                rest += '\n'
            }
            // 4 step end


            if (rest) {
                result.push(
                    {
                        name: "information_data",
                        value: rest
                    },
                )
            }

            return result;
        },
        closeQuiz(e) {
            this.sendForm(e, true)
            this.modal.id = false
        },
        resetForm() {
            Object.keys(window.defaultFields).forEach(item => {
                this.form[item] = window.defaultFields[item]
            });

            let phone = document.querySelector('.vp-form .vp-input[name="phone"]')
            phone.value = ''
        },
        sendForm(e, silence) {
            if(!e || !e.email) return
            let self = this
            let fields = this.serialize(e)
            const portalId = window.portal_id; // Замените на ваш HubSpot портал ID
            const formId = window.form_id; // Замените на ваш HubSpot форм GUID

            const formData = {
                fields: fields,
                context: {
                    pageUri: location.href
                }
            };

            let url = `https://api.hsforms.com/submissions/v3/integration/submit/${portalId}/${formId}`

            axios.post(url, formData, {
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(function (response) {
                    self.resetForm()

                    if(!silence){
                        let event = new CustomEvent('clear')
                        document.body.dispatchEvent(event)
                    }

                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    },
})
    .use(Components)
    .mount('#vp-app')