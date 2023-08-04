<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
    <title>Document</title>
</head>
<body>
    
    <script>
        const validate = new window.JustValidate('#form');
      </script>

    <form id="basic_form">
        <input id="basic_name" type="text" placeholder="Enter your name" /> 
        <input id="basic_email" type="text" placeholder="Enter your email" />
        <input id="basic_password" type="text" placeholder="Enter your password" />
        <input id="basic_age" type="text" placeholder="Enter your age" />
        <button type="submit">Submit</button><br>
      </form>
      
</body>
</html>

<script>
    // import JustValidate from 'just-validate';

// const validate = new JustValidate('#basic_form');
const validator = new JustValidate(document.querySelector('#basic_form'));

// validate
validator
  .addField(document.querySelector('#basic_name'), [
    {
      rule: 'required',
    },
    {
      rule: 'minLength',
      value: 3,
    },
    {
      rule: 'maxLength',
      value: 15,
    },
  ])
  .addField(document.querySelector('#basic_email'), [
    {
      rule: 'required',
    },
    {
      rule: 'email',
    },
  ])
  .addField(document.querySelector('#basic_password'), [
    {
      rule: 'required',
    },
    {
      rule: 'password',
    },
  ])
  .addField(document.querySelector('#basic_age'), [
    {
      rule: 'required',
    },
    {
      rule: 'number',
    },
    {
      rule: 'minNumber',
      value: 18,
    },
    {
      rule: 'maxNumber',
      value: 150,
    },
  ]);
</script>