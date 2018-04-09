$(document).ready(()=>{

    $('.Vmenu li').on('click', (e)=>{
        let className = e.currentTarget.id;
    });
    $('#photo').on('change', ()=>{
        let photoName = document.getElementById("photo").files[0].name;
        document.getElementById('photoName').innerText = photoName;
    });
    $('#passport').on('change', ()=>{
        let photoName = document.getElementById("passport").files[0].name;
        document.getElementById('passportPhotoName').innerText = photoName;
    });
});
