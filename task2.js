const images = [
    "https://c4.wallpaperflare.com/wallpaper/141/820/1006/disney-princesses-moana-vaiana-sea-cartoon-movie-wallpaper-preview.jpg",
    "https://universityschoolnews.com/wp-content/uploads/2016/04/zootopiaposter1.jpg",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIxXc46GmaafVngXNB5XsjsA21RtyDV7Y0v8-WTTcXdKlK1Lm5mMksQeA&s=10"
];
const headers=[
    "Moana",
    "Zootopia",
    "Coco"
];
let currentIndex = 0;
let currentHeaderIndex = 0;

function changeImage(direction) {
    currentIndex += direction;
    currentHeaderIndex += direction;
    if (currentIndex < 0) {
        currentIndex = images.length - 1;
        currentHeaderIndex = headers.length - 1;
    } else if (currentIndex >= images.length) {
        currentIndex = 0;
        currentHeaderIndex = 0;
    }
    document.getElementById("imgslider").src = images[currentIndex];
    document.getElementById("imgTitle").innerText = headers[currentHeaderIndex];
}
function backtotop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

setInterval(() => {
    changeImage(1);
}, 2500);