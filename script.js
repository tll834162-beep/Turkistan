```javascript
// Батырмаға басылған кезде

const button = document.querySelector("button");

button.addEventListener("click", function() {

    console.log("Хабарлама жіберілуде...");

});


// Көрікті жерлердің карточкалары

const cards = document.querySelectorAll(".card");

cards.forEach(function(card) {

    card.addEventListener("mouseenter", function() {

        card.style.transform = "translateY(-10px)";

    });

    card.addEventListener("mouseleave", function() {

        card.style.transform = "translateY(0)";

    });

});


// Сайт жүктелген кезде

window.addEventListener("load", function() {

    console.log("Түркістан сайты іске қосылды!");

});
```
