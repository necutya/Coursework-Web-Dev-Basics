document.addEventListener('DOMContentLoaded', ()=>{
   document.querySelector('#edit').addEventListener('click',()=>{

       var edit_button = document.createElement("button");
       edit_button.classList.add('button2');
       edit_button.attributes.type = 'POST';
       edit_button.innerText = 'Зберегти';
       document.querySelector('#edit').after(edit_button);

       document.querySelector('#name_settings').disabled = false;
       document.querySelector('#email_settings').disabled = false;
       document.querySelector('#phone_settings').disabled = false;
       document.querySelector('#country_settings').disabled = false;
       document.querySelector('#city_settings').disabled = false;

       document.querySelector('#edit').style.display='none';
   });
});
