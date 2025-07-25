const validation = new JustValidate("#signup");



validation
    .addField("#name", 
    [
        {
            rule: "required"
        }
    ])
    .addField("#firstname",
    [
        {
            rule: "required"
        }
    ])
    .addField("#date",
    [
        {
            rule: "required"
        }
    ])
    .addField("#phone",[
        {
            rule: "required"
        },
        {
            rule: "number",
            value: 11
        },
    ])
    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule:"email"
        },
        {
            validator:(value) =>() =>
            {
                return fetch("validate_email.php?email=" + encodeURIComponent(value))
                    .then(function(response)
                    {
                        return response.json();
                    })
                    .then(function(json)
                    {
                        return json.available;
                    });
            },
            errorMessage: "email is already taken"
        }
    ])
    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .addField("#confirm_password", [
        {
            validator:(value,fields)=>
            {
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Password should match"
        }
    ])
    .onSuccess((event) =>
    {
        document.getElementById("signup").submit();
    })

