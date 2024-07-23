function validateForm() {
    // Validate gender
    const gender = document.getElementById("gender").value;
    if (!gender) {
        alert("Champ civilité requis");
        return false;
    }

    // Validate lastname
    const lastname = document.getElementById("lastname").value;
    if (!lastname) {
        alert("Champ nom requis");
        return false;
    }

    // Validate firstname
    const firstname = document.getElementById("firstname").value;
    if (!firstname) {
        alert("Champ prénom requis");
        return false;
    }

    // Validate address
    const address = document.getElementById("address").value;
    if (!address) {
        alert("Champ adresse requis");
        return false;
    }

    // Validate postcode
    const postcode = document.getElementById("postcode").value;
    if (!postcode) {
        alert("Champ code postale requis");
        return false;
    }

    // Validate city
    const city = document.getElementById("city").value;
    if (!city) {
        alert("Champ ville requis");
        return false;
    }

    // Validate country
    const country = document.getElementById("country").value;
    if (!country) {
        alert("Champ pays requis");
        return false;
    }

    // Validate birtdhday
    const birtdhday = document.getElementById("birthday").value;
    if (!birtdhday) {
        alert("Champ date de naissance requis");
        return false;
    }

    // Validate phone
    const phone = document.getElementById("phone").value;
    const phonePattern = /^\d{10}$/;
    if (!phone) {
        alert("Champ téléphone requis");
        return false;
    } else if (!phonePattern.test(phone)) {
        alert("Téléphone doit être un numéro à 10 chiffres");
        return false;
    }

    // Validate fax
    const fax = document.getElementById("fax").value;
    const faxPattern = /^\d{10}$/;
    if (fax && !faxPattern.test(fax)) {
        alert("Fax doit être un numéro à 10 chiffres");
        return false;
    }

    // Validate email
    const email = document.getElementById("email").value;
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (!email) {
        alert("Champ email requis");
        return false;
    } else if (!emailPattern.test(email)) {
        alert("Format email non valide");
        return false;
    }

    // Validate URL
    const url = document.getElementById("url").value;
    const urlPattern = /^(https?:\/\/)?([\w-]+(\.[\w-]+)+)(\/[\w- ;,./?%&=]*)?$/;
    if (url && !urlPattern.test(url)) {
        alert("Format Url non valide");
        return false;
    }

    return true;
}
