<script>
    import {createForm} from "svelte-forms-lib";
    import * as yup from "yup";
    import {majors_hu, majors_en} from "src/pages/registration/data/getMajor";
    import {locale} from "svelte-i18n";

    const {form, errors, state, handleChange, handleSubmit} = createForm({
        initialValues: {
            name: "",
            email: ""
        },
        validationSchema: yup.object().shape({
            major: yup
                .string()
                .oneOf([])
                .required(),
            semester: yup
                .number().min(1).max(20).required(),
            name: yup.string().required(),
            neptun: yup.string().required(),
            gender: yup.string().required(),
            email: yup
                .string()
                .email()
                .required()
        }),
        onSubmit: values => {
            alert(JSON.stringify(values));
        }
    });
</script>

<div class="container">
    <form on:submit={handleSubmit}>
        <div class="row">
            <h4>Personal information</h4>
            <div class="input-group input-group-icon">
                <input id="name" name="name" type="text" placeholder="Full Name" on:change={handleChange}
                       on:blur={handleChange}
                       bind:value={$form.name}/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
                {#if $errors.name}
                    <small>{errors.name}</small>
                {/if}
            </div>
            <div class="input-group input-group-icon">
                <input id="email" name="email" type="email" placeholder="Email Adress" on:change={handleChange}
                       on:blur={handleChange}
                       bind:value={$form.email}/>
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
                {#if $errors.email}
                    <small>{errors.email}</small>
                {/if}
            </div>
            <div class="input-group input-group-icon">
                <input id="neptun" name="neptun" type="text" placeholder="Neptun code" on:change={handleChange}
                       on:blur={handleChange}
                       bind:value={$form.neptun}/>
                <div class="input-icon"><i class="fas fa-id-badge"></i></div>
                {#if $errors.neptun}
                    <small>{errors.neptun}</small>
                {/if}
            </div>
            <div class="input-group input-group-icon">
                {#if $locale === 'hu'}
                    <select class="col-full" id="major_hu" name="major" on:change={handleChange}
                            on:blur={handleChange}
                            bind:value={$form.major}>
                        {#each majors_hu as major}
                            <option>{major.name}</option>
                        {/each}
                    </select>
                {/if}
                {#if $locale === 'en'}
                <select class="col-full" id="major_en" name="major" on:change={handleChange}
                        on:blur={handleChange}
                        bind:value={$form.major}>
                    {#each majors_en as major}
                        <option>{major.name}</option>
                    {/each}
                </select>
            {/if}
                <div class="input-icon"><i class="fas fa-university"></i></div>
            </div>
        </div>
        <div class="row">
            <div class="col-half">
                <h4>Semester</h4>
                <div class="input-group">
                    <select>
                        {#each Array(20) as _, i}
                            <option value={i+1}>{i + 1}. semester</option>
                        {/each}
                    </select>
                </div>
            </div>
            <div class="col-half">
                <h4>Gender</h4>
                <div class="input-group">
                    <input id="gender-male" type="radio" name="gender" value="male"/>
                    <label for="gender-male">Male</label>
                    <input id="gender-female" type="radio" name="gender" value="female"/>
                    <label for="gender-female">Female</label>
                </div>
            </div>
        </div>
        <div class="row">
            <h4>Interested programs</h4>

        </div>
        <div class="row">
            <h4>Terms and Conditions</h4>
            <div class="input-group">
                <input id="terms" type="checkbox"/>
                <label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm
                    I have read the privacy policy.</label>
            </div>
        </div>
    </form>
</div>

<style lang="scss">
  :root {
    --primary-light: #a6f9d6;
    --primary: #5be2a9;
    --primary-dark: #53ce9a;
    --secondary: #1e2145;
    --white: #fff;
    --grey: #e6e6ff;
    --grey-dark: #6d7098;
    --red: #ff6b6b;
  }

  /* used for errors */
  small {
    display: block;
    font-size: 12px;
    color: var(--red);
    margin-top: 10px;
  }

  /* 64ac15 */
  *,
  *:before,
  *:after {
    box-sizing: border-box;
  }

  body {
    padding: 1em;
    font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 15px;
    color: #b9b9b9;
    background-color: #e3e3e3;
  }

  h4 {
    color: #f0a500;
  }

  input,
  input[type="radio"] + label,
  input[type="checkbox"] + label:before,
  select option,
  select {
    width: 100%;
    padding: 1em;
    line-height: 1.4;
    background-color: #f9f9f9;
    border: 1px solid #e5e5e5;
    border-radius: 3px;
    -webkit-transition: 0.35s ease-in-out;
    -moz-transition: 0.35s ease-in-out;
    -o-transition: 0.35s ease-in-out;
    transition: 0.35s ease-in-out;
    transition: all 0.35s ease-in-out;
  }

  input:focus {
    outline: 0;
    border-color: #bd8200;
  }

  input:focus + .input-icon i {
    color: #f0a500;
  }

  input:focus + .input-icon:after {
    border-right-color: #f0a500;
  }

  input[type="radio"] {
    display: none;
  }

  input[type="radio"] + label,
  select {
    display: inline-block;
    width: 50%;
    text-align: center;
    float: left;
    border-radius: 0;
  }

  input[type="radio"] + label:first-of-type {
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
  }

  input[type="radio"] + label:last-of-type {
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
  }

  input[type="radio"] + label i {
    padding-right: 0.4em;
  }

  input[type="radio"]:checked + label,
  input:checked + label:before,
  select:focus,
  select:active {
    background-color: #f0a500;
    color: #fff;
    border-color: #bd8200;
  }

  input[type="checkbox"] {
    display: none;
  }

  input[type="checkbox"] + label {
    position: relative;
    display: block;
    padding-left: 1.6em;
  }

  input[type="checkbox"] + label:before {
    position: absolute;
    top: 0.2em;
    left: 0;
    display: block;
    width: 1em;
    height: 1em;
    padding: 0;
    content: "";
  }

  input[type="checkbox"] + label:after {
    position: absolute;
    top: 0.45em;
    left: 0.2em;
    font-size: 0.8em;
    color: #fff;
    opacity: 0;
    font-family: FontAwesome;
    content: "\f00c";
  }

  input:checked + label:after {
    opacity: 1;
  }

  select {
    height: 3.4em;
    line-height: 2;
  }

  select:first-of-type {
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
  }

  select:last-of-type {
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
  }

  select:focus,
  select:active {
    outline: 0;
  }

  select option {
    background-color: #f0a500;
    color: #fff;
  }

  .input-group {
    margin-bottom: 1em;
    zoom: 1;
  }

  .input-group:before,
  .input-group:after {
    content: "";
    display: table;
  }

  .input-group:after {
    clear: both;
  }

  .input-group-icon {
    position: relative;
  }

  .input-group-icon input {
    padding-left: 4.4em;
  }

  .input-group-icon .input-icon {
    position: absolute;
    top: 0;
    left: 0;
    width: 3.4em;
    height: 3.4em;
    line-height: 3.4em;
    text-align: center;
    pointer-events: none;
  }

  .input-group-icon .input-icon:after {
    position: absolute;
    top: 0.6em;
    bottom: 0.6em;
    left: 3.4em;
    display: block;
    border-right: 1px solid #e5e5e5;
    content: "";
    -webkit-transition: 0.35s ease-in-out;
    -moz-transition: 0.35s ease-in-out;
    -o-transition: 0.35s ease-in-out;
    transition: 0.35s ease-in-out;
    transition: all 0.35s ease-in-out;
  }

  .input-group-icon .input-icon i {
    -webkit-transition: 0.35s ease-in-out;
    -moz-transition: 0.35s ease-in-out;
    -o-transition: 0.35s ease-in-out;
    transition: 0.35s ease-in-out;
    transition: all 0.35s ease-in-out;
  }

  .container {
    max-width: 38em;
    padding: 1em 3em 2em 3em;
    margin: 0em auto;
    background-color: #fff;
    border-radius: 4.2px;
    box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
  }

  .row {
    zoom: 1;
  }

  .row:before,
  .row:after {
    content: "";
    display: table;
  }

  .row:after {
    clear: both;
  }

  .col-full{
    width: 100%;
  }
  .col-half {
    padding-right: 10px;
    float: left;
    width: 50%;
  }

  .col-half:last-of-type {
    padding-right: 0;
  }

  .col-third {
    padding-right: 10px;
    float: left;
    width: 33.33333333%;
  }

  .col-third:last-of-type {
    padding-right: 0;
  }

  @media only screen and (max-width: 540px) {
    .col-half {
      width: 100%;
      padding-right: 0;
    }
  }

</style>