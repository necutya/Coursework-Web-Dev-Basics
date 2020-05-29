document.addEventListener("DOMContentLoaded", () => {
    var menu = document.querySelector('#menu');
    var basket_box = document.querySelector('#basket-box');
    var login = document.querySelector('#login');
    var registration = document.querySelector('#registration');
    menu.style.display='none';
    basket_box.style.display='none';

    // login.style.display='none';
    // registration.style.display='none';

    //Open/close menu
    document.querySelector('#menu_header').addEventListener('click', ()=>{

        document.addEventListener('click', e=> {
            let target = e.target;
            let its_menu = target === menu || menu.contains(target);
            let its_button = target === document.querySelector('#menu_header');
            let menu_is_active = menu.style.display === 'flex';

            if (!its_menu && !its_button && menu_is_active) {
                menu.style.display = 'none';
            }
        });
        if(menu.style.display === 'flex') {
            menu.style.display = 'none';
        }
        else{
            menu.style.display = 'flex'
            // menu.classList.add('.animatedElem')
        }
    });


    //Open/close basket_box
    document.querySelector('#basket_header').addEventListener('click', ()=>{

        document.addEventListener('click', e=> {
            let target = e.target;
            let its_basket_header = target === basket_box || basket_box.contains(target);
            let its_button = target === document.querySelector('#basket_header');
            let basket_is_active = basket_box.style.display === 'block'

            if (!its_basket_header && !its_button && basket_is_active) {
                basket_box.style.display = 'none'
            }
        });



        if(basket_box.style.display === 'block') {
            basket_box.style.display = 'none';
        }
        else{
            basket_box.style.display = 'block'
            // menu.classList.add('.animatedElem')
        }


    });




    //ATTENTION!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //PLEASE, DON'T CHECK IT
    //GIVNOCODE IS HERE
    //WRITTEN BY SAVCHENKO THARAS

    var blur = document.createElement('blur');
    blur.classList.add('blur');
    //Open/close redister CHANGE
    document.querySelector('#account_header').addEventListener('click', ()=>{

        if (registration.style.display === 'flex') {
            registration.style.display = 'none';
            document.querySelector('blur').remove();
        }
        else {
            registration.style.display = 'flex';
            document.querySelector('main').append(blur);
        }

        registration.querySelector('#redirect_enter').addEventListener('click', ()=>{
            registration.style.display = 'none';
            login.style.display = 'flex';

        });

        login.querySelector('#redirect_registration').addEventListener('click', ()=>{
            login.style.display = 'none';
            registration.style.display = 'flex';

        });

        document.querySelectorAll('.cross').forEach(button => {
            button.addEventListener('click', () => {
                button.parentNode.parentNode.style.display = 'none';
                document.querySelector('blur').remove();
            });
        });

    });



    if(registration.style.display==='flex' || login.style.display==='flex') {
        document.querySelector('main').append(blur);
    }
    else if (document.querySelector('blur')){
        document.querySelector('blur').remove();
    }

    registration.querySelector('#redirect_enter').addEventListener('click', ()=>{
        registration.style.display = 'none';
        login.style.display = 'flex';

    });

    login.querySelector('#redirect_registration').addEventListener('click', ()=>{
        login.style.display = 'none';
        registration.style.display = 'flex';

    });

    document.querySelectorAll('.cross').forEach(button => {
        button.addEventListener('click', () => {
            button.parentNode.parentNode.style.display = 'none';
            document.querySelector('blur').remove();
        });
    });


    document.querySelectorAll('.reset').forEach(reset=>{
       reset.addEventListener('click', ()=>{
           // alert(reset);
           reset.parentElement.style.display = 'none';
           document.querySelector('#reset').style.display = 'flex';
       })
    });

});
