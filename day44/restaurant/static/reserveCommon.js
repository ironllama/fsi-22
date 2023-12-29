function handleSubmit(formElem, action, callback) {
    formElem.addEventListener("submit", e => {
        e.preventDefault();

        const myForm = new FormData(formElem);
        const myFormObj = {};
        for (const [key, val] of myForm.entries()) myFormObj[key] = val;
        // console.log(JSON.stringify(myFormObj));

        fetch(action, {
            method: "POST",
            headers: { 'Content-Type': 'application/json', },
            body: JSON.stringify(myFormObj),
        })
            .then(res => res.json())
            .then(callback);
    });
}