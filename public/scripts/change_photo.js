document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.small_photo').forEach(photo =>  {
        photo.addEventListener('click', ()=>{
           var main_photo = document.querySelector('#main_photo');
           main_photo.style.backgroundImage = photo.style.backgroundImage;
        });
    });

});
