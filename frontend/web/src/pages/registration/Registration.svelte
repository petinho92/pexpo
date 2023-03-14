<script>
    import {createForm} from "svelte-forms-lib";
    import * as yup from "yup";
    import {majors} from "src/pages/registration/data/getMajor";
    import {programs1, programs2} from "src/pages/registration/data/getPrograms.ts";
    import {_, locale} from "svelte-i18n";
    import handleFetch from "src/services/handle-fetch";
    import Modal from './components/popup/Modal.svelte';
    import {modal} from "./components/popup/stores.ts";
    import Popup from "./components/popup/Popup.svelte";
    import fetchData from "../../services/asyncFetch";
    import {onDestroy} from "svelte";

    let open;
    let terms;
    let response;

    const [data, loading, error, get] = fetchData("/config/get");

    const {form, errors, state, handleChange, handleSubmit} = createForm({
        initialValues: {
            name: "",
            email: "",
            major: "",
            semester: "",
            neptun: "",
            neptun2: "",
            gender: "",
            interested1: [],
            interested2: [],
            terms: false,
            lang: $locale
        },
        validationSchema: yup.object().shape({
            major: yup
                .string()
                .required(),
            semester: yup
                .number().required(),
            // name: yup.string().required(),
            neptun: yup.string().required(),
            neptun2: yup.string().required().test(
                'neptunsNotMatch',
                'Mismatch',
                function (item) {
                    return this.parent.neptun === this.parent.neptun2
                }),
            gender: yup.string().required(),
            email: yup.string().email().required(),
            interested1: yup.array().min(1).required(),
            interested2: yup.array().min(1).required()
        }),
        onSubmit: values => {
            fetch("student/save",
                {
                    method: "POST",
                    body: JSON.stringify(values)
                })
                .then(handleFetch)
                .then(resp => {
                    if (resp.statusCode === 200) {

                        modal.set(Popup);
                    }
                })

        }
    });


    //TODO: have to  checkbox outlook, add lang for POST design the submit button, test validators

    onDestroy(() => {
        $modal = null;
    })

</script>
<section>
    {#if !$loading && $data.registration.active}
        <Modal show={$modal} closeButton={false} closeOnOuterClick={false} closeOnEsc={false}/>


        <div class="container">
            <form on:submit={handleSubmit}>
                <div class="row has-text-centered has-text-weight-bold mb-5">
                    <h2 class="is-size-3">{$_('form.student.title')}</h2>
                </div>
                <hr>
                <div class="row">
                    <h4>{$_('form.student.personal')}</h4>
                    <div class="input-group input-group-icon">
                        <input class:input-error={$errors.name} id="name" name="name" type="text"
                               placeholder="{$_('form.common.name')}"
                               on:change={handleChange}
                               on:blur={handleChange}
                               bind:value={$form.name}/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        {#if $errors.name}
                            <small>{$_('form.common.required')}</small>
                        {/if}
                    </div>
                    <div class="input-group input-group-icon">
                        <input class:input-error={$errors.email} id="email" name="email" type="email"
                               placeholder="{$_('form.common.email')}"
                               on:change={handleChange}
                               on:blur={handleChange}
                               bind:value={$form.email}/>
                        <div class="input-icon"><i class="fa fa-envelope"></i></div>
                        {#if $errors.email && !$errors.email.includes('valid')}
                            <small>{$_('form.common.required')}</small>
                        {/if}
                        {#if $errors.email.includes('valid')}
                            <small>{$_('form.common.email_invalid')}</small>
                        {/if}
                    </div>
                    <div class="input-group input-group-icon">
                        <input class:input-error={$errors.neptun} id="neptun" name="neptun" type="text"
                               placeholder="{$_('form.common.neptun')}" on:change={handleChange}
                               on:blur={handleChange}
                               bind:value={$form.neptun}/>
                        <div class="input-icon"><i class="fas fa-id-badge"></i></div>
                        {#if $errors.neptun}
                            <small>{$_('form.common.required')}</small>
                        {/if}

                    </div>
                    <div class="input-group input-group-icon">
                        <input class:input-error={$errors.neptun2} id="neptun2" name="neptun2" type="text"
                               placeholder="{$_('form.common.neptun.confirm')}" on:change={handleChange}
                               on:blur={handleChange}
                               bind:value={$form.neptun2}/>
                        <div class="input-icon"><i class="fas fa-id-badge"></i></div>
                        {#if $errors.neptun2 && !$errors.neptun2.includes('Mismatch')}
                            <small>{$_('form.common.required')}</small>
                        {/if}
                        {#if $errors.neptun2.includes('Mismatch')}
                            <small>{$_('form.common.mismatch')}</small>
                        {/if}
                    </div>
                </div>
                <div>
                    <h4>{$_('form.student.major')}</h4>
                    <div class="input-group input-group-icon">
                        <select class="col-full" id="major" name="major" on:change={handleChange}
                                on:blur={handleChange}
                                bind:value={$form.major}
                                class:input-error={$errors.major}
                        >
                            {#each majors as major}
                                {#if $locale === 'hu'}
                                    <option>{major.name_hu}</option>
                                {/if}
                                {#if $locale === 'en' && major.name_en}
                                    <option value={major.name_hu}>{major.name_en}</option>
                                {/if}
                            {/each}
                        </select>

                        <div class="input-icon"><i class="fas fa-university"></i></div>
                        {#if $errors.major}
                            <small>{$_('form.common.required.select')}</small>
                        {/if}
                    </div>

                </div>
                <div class="row">
                    <div class="input-group">

                        <div class="col-half">
                            <h4>{$_('form.student.semester')}</h4>
                            <select bind:value={$form.semester} class:input-error={$errors.semester}>
                                {#each Array(20) as _, i}
                                    <option value={i+1}>{i + 1}. semester</option>
                                {/each}
                            </select>
                            {#if $errors.semester}
                                <small>{$_('form.common.required.select')}</small>
                            {/if}
                        </div>
                        <div class="col-half">
                            <h4>{$_('form.common.gender')}</h4>
                            <input id="gender-male" type="radio" name="gender" bind:group={$form.gender} value="férfi"/>
                            <label class:gender-error={$errors.gender}
                                   for="gender-male">{$_('form.common.gender.male')}</label>
                            <input id="gender-female" type="radio" name="gender" bind:group={$form.gender} value="nő"/>
                            <label class:gender-error={$errors.gender}
                                   for="gender-female">{$_('form.common.gender.female')}</label>

                            {#if $errors.gender}
                                <small>{$_('form.common.required.select')}</small>
                            {/if}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4>{$_('form.common.programs.label.first')}</h4>
                    <div class="input-group">
                        {#each programs1 as program}
                            <input
                                    type="checkbox"
                                    id="{program.id}"
                                    name="interested1"
                                    value={program.id}
                                    bind:group={$form.interested1}

                            />
                            <label for="{program.id}">{program.name}</label>

                        {/each}
                        {#if $errors.interested1.length !== 0}
                            <small>{$_('form.common.required.select')}</small>
                        {/if}
                    </div>
                </div>
                <div class="row">
                    <h4>{$_('form.common.programs.label.second')}</h4>
                    <div class="input-group">
                        {#each programs2 as program2}
                            <input
                                    type="checkbox"
                                    id="{program2.id}"
                                    name="interested2"
                                    value={program2.id}
                                    bind:group={$form.interested2}

                            />
                            <label for="{program2.id}">{program2.name}</label>

                        {/each}
                        {#if $errors.interested2.length !== 0}
                            <small>{$_('form.common.required.select')}</small>
                        {/if}
                    </div>

                </div>
                <div class="row">
                    <h4>{$_('form.common.dividers.termsofuse')}</h4>
                    <div class="input-group">
                        <input id="terms" type="checkbox" bind:checked={$form.terms}/>
                        <label for="terms">{@html $_('form.common.label.privacy_policy.student')}</label>
                    </div>
                </div>
                <div class="row has-text-centered">
                    <button type="submit" class="button" disabled={!$form.terms}>{$_('form.register')}</button>
                </div>
            </form>
        </div>
    {:else if $loading}
        <div class="has-text-centered">
            <a class="button is-loading is-size-1 is-info is-outlined is-borderless"></a>
            <h1>Loading...</h1>
        </div>
    {:else if !$loading && !$data.registration.active}
        <div class="has-text-centered is-size-5">
            <h1>{$_('form.register.inactive')}</h1>
        </div>
    {/if}
</section>
<style lang="scss">

  section {
    padding-top: 3rem;
    padding-bottom: 3rem;
    min-height: 30em;
    background: #F5F5F5;

  }
  .is-borderless{
    border: none;
  }
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
    margin-left: 10px;
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
    margin-bottom: 1em;
  }

  h2 {
    color: #f0a500;
  }

  .input-error {
    border-color: #cc0000;
  }

  input[type="radio"] + .gender-error {
    width: 50%;
    padding: 1em;
    line-height: 1.7;
    background-color: #f9f9f9;
    border: 1px solid #cc0000;
    border-radius: 3px;
    -webkit-transition: 0.35s ease-in-out;
    -moz-transition: 0.35s ease-in-out;
    -o-transition: 0.35s ease-in-out;
    transition: 0.35s ease-in-out;
    transition: all 0.35s ease-in-out;
  }

  input,
  input[type="radio"] + label,
  input[type="checkbox"] + label:before,
  select option,
  select {
    width: 100%;
    padding: 1em;
    line-height: 1.7;
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

  input[type="radio"] + label {
    float: left;
    display: inline-block;
    width: 50%;
    text-align: center;
    border-radius: 0;
  }

  select {
    display: inline-block;
    width: 50%;
    text-align: center;
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
    height: 4em;
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
    margin-left: auto;
    margin-right: auto;
    background-color: #fff;
    border-radius: 4.2px;
    box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
  }

  .row {
    zoom: 1;
    margin-bottom: 1.2em;
  }

  .row:before,
  .row:after {
    content: "";
    display: table;
  }

  .row:after {
    clear: both;
  }

  .col-full {
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
    //float: left;
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

  @media screen and (max-width: 1023px){
    section {
      padding-top: 0;
      padding-bottom: 0;
    }
    .container {
      margin-left: 0;
      margin-right: 0;
      max-width: 100%;
    }
  }

</style>