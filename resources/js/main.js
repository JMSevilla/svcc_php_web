
const firstname = document.getElementById('txtfirstname')
const lastname = document.getElementById('txtlastname')

$('#onSubmit').click(() => {
    const object ={ 
        fname : firstname.value,
        lname : lastname.value,
        trigger: true
    }
    $.post('app/Helpers/post.helper.php', object, (response) => {
        console.log(response)
    })
})