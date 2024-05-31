import ScrollMagic from "scrollmagic";
import anime from "animejs";

let stepAnimation = function (){
    // let verticalSliders = document.querySelectorAll('.vp-steps-block')
    // let controller = new ScrollMagic.Controller();
    //
    // verticalSliders.forEach(item => {
    //     let stepBtns = item.querySelectorAll('[data-step-btn]')
    //     let steps = item.querySelectorAll('.vp-step-slide')
    //
    //     stepBtns.forEach(btn => {
    //         btn.addEventListener('click', function(){
    //             let block = this.closest('.scrollmagic-pin-spacer')
    //             let inner = block.querySelector('.vp-steps-block')
    //             let index = Number(this.dataset.stepBtn);
    //             let h = block.offsetHeight - inner.offsetHeight - 125;
    //             let blockHeight = (h / (stepBtns.length-1)) * (index);
    //             let scroll = window.scrollY - (block.getBoundingClientRect().y * -1) + blockHeight;
    //             window.scrollTo(0, scroll)
    //
    //             setTimeout(function (){
    //                 steps.forEach((step, i) => {
    //                     if(i === index){
    //                         step.classList.add('active')
    //                         step.classList.remove('active-end')
    //                     }
    //                     if(i > index){
    //                         step.classList.remove('active')
    //                         step.classList.remove('active-end')
    //                     }
    //                 })
    //             }, 100)
    //         })
    //     })
    //
    //
    //     let tl2 = anime.timeline({autoplay: false});
    //
    //     let s2a1 = {
    //         targets: item.querySelectorAll('.vp-step-slide[data-step-slide]'),
    //         translateX: ['50vw', 0],
    //         opacity: [0, 1],
    //         duration: 1000,
    //         easing: 'linear',
    //         delay: anime.stagger(1000) // increase delay by 100ms for each elements.
    //     };
    //
    //     if(item.getBoundingClientRect().y < 0){
    //         setTimeout(function (){
    //             item.querySelectorAll('.vp-step-slide').forEach(el => {
    //                 el.classList.remove('active')
    //                 el.classList.add('active-end')
    //             })
    //         }, 100)
    //     }
    //
    //     tl2.add(s2a1);
    //
    //     let scene = new ScrollMagic.Scene({
    //         triggerElement: item,
    //         duration: 4500,
    //         triggerHook: 0,
    //         offset: -50,
    //         //reverse: false,
    //     })
    //         .on("progress", function (event) {
    //             if(tl2.children && tl2.children[0] && tl2.children[0].animatables){
    //                 let end = Math.floor((tl2.progress - 4) / (100/tl2.children[0].animatables.length)) - 1
    //                 let start = Math.round(tl2.progress / (100/tl2.children[0].animatables.length)) - 1
    //
    //                 if(start === 0 && end < 0){
    //                     item.querySelectorAll('.vp-step-slide')[0].classList.remove('active')
    //                     item.querySelectorAll('.vp-step-slide')[0].classList.add('active-end');
    //                 }
    //                 else if(start < 0 && end < 0){
    //                     item.querySelectorAll('.vp-step-slide')[0].classList.remove('active-end')
    //                     item.querySelectorAll('.vp-step-slide')[0].classList.add('active')
    //                 }
    //
    //                 //tl2.children[0].animatables.forEach(item => item.target.classList.remove('active'))
    //                 if(tl2.children[0].animatables[start]){
    //                     tl2.children[0].animatables[start].target.classList.remove('active-end')
    //                     tl2.children[0].animatables[start].target.classList.add('active')
    //                 }
    //                 if(tl2.children[0].animatables[end]){
    //                     tl2.children[0].animatables[end].target.classList.remove('active')
    //                     tl2.children[0].animatables[end].target.classList.add('active-end')
    //                 }
    //             }
    //
    //             tl2.seek(tl2.duration * event.progress);
    //
    //             if(Math.ceil(event.progress*100) >= 100){
    //                 // let padding = parseInt(item.parentNode.style.paddingBottom)
    //                 // if(padding > 0){
    //                 //     window.scrollTo(0, window.scrollY - padding)
    //                 // }
    //                 // scene.duration(1)
    //             }
    //         })
    //
    //         .setPin(item)
    //         .addTo(controller);
    // })
}
export default stepAnimation