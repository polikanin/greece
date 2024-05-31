import ScrollMagic from "scrollmagic";
import anime from "animejs";

let verticalAnimation = function (){
    let verticalSliders = document.querySelectorAll('.vp-vertical-slider-block')
    let controller = new ScrollMagic.Controller();

    verticalSliders.forEach(item => {
        let tl2 = anime.timeline({autoplay: false});
        let progress = item.querySelector('.vp-vertical-slider-block--preview-progress span')
        let items = item.querySelector('.vp-vertical-slider-block--preview-items')
        let btns = item.querySelectorAll('.vp-vertical-slide--btn')
        let durationPerSlide = 500

        let s2a1 = {
            targets: item.querySelectorAll('.vp-vertical-slide[data-animated-slide]'),
            translateY: ['50vh', 0],
            opacity: [0, 1],
            duration: 1000,
            easing: 'linear',
            delay: anime.stagger(1000) // increase delay by 100ms for each elements.
        };

        tl2.add(s2a1);

        let offset = -50

        if(window.innerWidth < 768){
            offset = 50
        }

        let scene2 = new ScrollMagic.Scene({
            triggerElement: item,
            duration: durationPerSlide * btns.length,
            triggerHook: 0,
            offset: offset
        })
            .on("progress", function (event) {
                if(tl2.children && tl2.children[0] && tl2.children[0].animatables){
                    let index = Math.round(tl2.progress / (100/tl2.children[0].animatables.length))
                    btns.forEach(item => item.classList.remove('active'))
                    if(btns[index]){
                        btns[index].classList.add('active')
                        items.scroll(0, btns[index].offsetTop);
                    }
                }

                progress.style.height = tl2.progress + '%'
                tl2.seek(tl2.duration * event.progress);
            })

            .setPin(item)
            .addTo(controller);
    })
}
export default verticalAnimation