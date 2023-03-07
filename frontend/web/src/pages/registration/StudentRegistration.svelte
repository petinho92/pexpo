<script>
    import {_} from "svelte-i18n";
    import {Button} from 'svelma';
    import StudentFormData from "./data/studentFormData.ts";
    import {majors} from "./data/getMajor.ts";
    import fetchData from "src/services/asyncFetch";
    import {hirundinidae} from "src/services/hirundinidae.ts";
    import ModalCard from "./components/ModalCard.svelte";
    import InputField from "./components/InputField.svelte";

    import SelectField from "./components/SelectField.svelte";
    import {active} from "../../services/store.ts";
    import {locale} from "svelte-i18n";
    import Footer from "src/components/Footer.svelte";
    import {semesters_hu, semesters_en} from "./data/getSemester.ts";
    import {programs1, programs2} from "./data/getPrograms.ts";


    let formData = new StudentFormData();
    let selectedPrograms = [];
    let selectedPrograms2 = [];
    let selectedMajor = "";
    let selectedSemester = "";
    let privacy;
    let covid;

    function sendData() {
        formData.major = selectedMajor.name;
        formData.semester = selectedSemester.name;
        formData.programs = selectedPrograms.concat(selectedPrograms2);
        formData.lang = $locale;
        hirundinidae(formData);
    }

</script>
<div class="container is-max-desktop mt-6 cont">
    <div class="tile is-parent">
        <div class="tile is-child box form-border">
            <p class="title has-text-centered">{$_('menu.registration.registration')}</p>
            <div class="is-divider is-info" data-content={$_('form.common.dividers.personal_info')}></div>


            <InputField placeholder={$_('form.common.name')} label={$_('form.common.name')} needIcon={true}
                        require={true} bind:value={formData.name}
                        iconTag="fas fa-user"/>
            <InputField placeholder="example@example.com" label="Email" require={true} needIcon={true}
                        iconTag="fas fa-envelope" bind:value={formData.email}/>
            <InputField placeholder="Neptun kód" label={$_('form.common.neptun')} needIcon={true} require={true}
                        bind:value={formData.neptun} iconTag="fas fa-laptop-code"/>


<!--            <InputField placeholder="+36301234567" label={$_('form.common.mobile')} needIcon={true} require={false}-->
<!--                        bind:value={formData.mobile}-->
<!--                        iconTag="fas fa-mobile"/>-->
<!--            {#if $locale === "hu"}-->
<!--                <SelectField label="Szak " collection={majors_hu} require={true} optionIdentifier="name"-->
<!--                             labelIdentifier="name" bind:value={selectedMajor}-->
<!--                             placeHolder={$_('form.common.selectFirstElement')}/>-->
<!--                <SelectField label="Szemester" collection={semesters_hu} require={true} optionIdentifier="name"-->
<!--                             labelIdentifier="name" bind:value={selectedSemester}-->
<!--                             placeHolder={$_('form.common.selectFirstElement')}/>-->
<!--            {/if}-->

<!--            {#if $locale === "en"}-->
<!--                <SelectField label="Major " collection={majors_en} require={true} optionIdentifier="name"-->
<!--                             labelIdentifier="name" bind:value={selectedMajor}-->
<!--                             placeHolder={$_('form.common.selectFirstElement')}/>-->
<!--                <SelectField label="Semester" collection={semesters_en} require={true} optionIdentifier="name"-->
<!--                             labelIdentifier="name" bind:value={selectedSemester}-->
<!--                             placeHolder={$_('form.common.selectFirstElement')}/>-->
<!--            {/if}-->


            <br>
            <div class="is-divider is-info" data-content={$_('form.common.dividers.programs')}></div>
            <label class="label has-text-left">{$_('form.common.programs.label.first')}<b
                    class="has-text-danger">*</b>
            </label>
            {#each programs1 as prog}
                <input
                        type="checkbox"
                        bind:group={selectedPrograms}
                        value={prog}
                /> {prog.name}<br>
            {/each}
            <br>
            <label class="label has-text-left">{$_('form.common.programs.label.second')}<b
                    class="has-text-danger">*</b>
            </label>
            {#each programs2 as prog}
                <input
                        type="checkbox"
                        bind:group={selectedPrograms2}
                        value={prog}
                /> {prog.name}<br>
            {/each}
            <div class="is-divider is-info" data-content={$_('form.common.dividers.termsofuse')}></div>
            <label class="checkbox has-text-left-mobile">
                <br><input type="checkbox" bind:checked={covid}>
                {$_('form.common.label.consent')}<b
                    class="has-text-danger">*</b>
            </label>
            <label class="checkbox has-text-left-mobile">
                <br><input type="checkbox" bind:checked={privacy}>
                {@html $_('form.common.label.privacy_policy.student')}<b
                    class="has-text-danger">*</b>
            </label>

            <div class="field mt-4">
                <Button type="is-info" on:click={sendData} disabled={!privacy | !covid}
                        >{$_('menu.registration.registration')}</Button>
            </div>
        </div>
    </div>
</div>


<ModalCard bind:active={$active} title={$_('modal.title')}>
    <div class="modal-card-body">
        <p></p>
        <p>{$_('modal.body')}</p>
        <p>{$_('modal.body1')}</p>
        <p></p>
    </div>
</ModalCard>

<!--<section>-->
<!--    <div class="card-container">-->
<!--        <div class="screen">-->
<!--            <div class="screen__content">-->
<!--                <form class="login">-->
<!--                    <div class="login__field">-->
<!--                        <i class="login__icon fas fa-user"></i>-->
<!--                        <input type="text" class="login__input" placeholder="User name / Email">-->
<!--                    </div>-->
<!--                    <div class="login__field">-->
<!--                        <i class="login__icon fas fa-user"></i>-->
<!--                        <input type="text" class="login__input" placeholder="User name / Email">-->
<!--                    </div>-->
<!--                    <div class="login__field">-->
<!--                        <i class="login__icon fas fa-user"></i>-->
<!--                        <input type="text" class="login__input" placeholder="User name / Email">-->
<!--                    </div>-->
<!--                    <div class="login__field">-->
<!--                        <i class="login__icon fas fa-user"></i>-->
<!--                        <input type="text" class="login__input" placeholder="User name / Email">-->
<!--                    </div>-->
<!--                    <div class="login__field">-->
<!--                        <i class="login__icon fas fa-user"></i>-->
<!--                        <input type="text" class="login__input" placeholder="User name / Email">-->
<!--                    </div>-->
<!--                    <div class="login__field">-->
<!--                        <i class="login__icon fas fa-user"></i>-->
<!--                        <input type="text" class="login__input" placeholder="User name / Email">-->
<!--                    </div>-->
<!--                    <div class="login__field">-->
<!--                        <i class="login__icon fas fa-user"></i>-->
<!--                        <input type="text" class="login__input" placeholder="User name / Email">-->
<!--                    </div>-->
<!--                    <div class="login__field">-->
<!--                        <i class="login__icon fas fa-user"></i>-->
<!--                        <input type="text" class="login__input" placeholder="User name / Email">-->
<!--                    </div>-->
<!--                    <div class="login__field">-->
<!--                        <i class="login__icon fas fa-user"></i>-->
<!--                        <input type="text" class="login__input" placeholder="User name / Email">-->
<!--                    </div>-->
<!--                    <div class="login__field">-->
<!--                        <i class="login__icon fas fa-user"></i>-->
<!--                        <input type="text" class="login__input" placeholder="User name / Email">-->
<!--                    </div>-->
<!--                    <div class="login__field">-->
<!--                        <i class="login__icon fas fa-user"></i>-->
<!--                        <input type="text" class="login__input" placeholder="User name / Email">-->
<!--                    </div>-->
<!--                    <div class="login__field">-->
<!--                        <i class="login__icon fas fa-lock"></i>-->
<!--                        <input type="password" class="login__input" placeholder="Password">-->
<!--                    </div>-->
<!--                    <button class="button login__submit">-->
<!--                        <span class="button__text">Log In Now</span>-->
<!--                        <i class="button__icon fas fa-chevron-right"></i>-->
<!--                    </button>-->
<!--                </form>-->
<!--                <div class="social-login">-->
<!--                    <h3>log in via</h3>-->
<!--                    <div class="social-icons">-->
<!--                        <a href="#" class="social-login__icon fab fa-instagram"></a>-->
<!--                        <a href="#" class="social-login__icon fab fa-facebook"></a>-->
<!--                        <a href="#" class="social-login__icon fab fa-twitter"></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="screen__background">-->
<!--                <span class="screen__background__shape screen__background__shape4"></span>-->
<!--                <span class="screen__background__shape screen__background__shape3"></span>-->
<!--                <span class="screen__background__shape screen__background__shape2"></span>-->
<!--                <span class="screen__background__shape screen__background__shape1"></span>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<style>
    .form-border {
        border: .6em solid #D3AC2B;
        background: url("/~web/images/registrationbg.svg");
        background-size: cover;
        background-repeat: no-repeat;

    }



    .card-container {
        display: flex;
        padding-top: 3em;
        padding-bottom: 5em;
        justify-content: center;
        min-height: 100vh;
    }

    .screen {
        background: linear-gradient(90deg, #475570, #333D51);
        position: relative;
        height: 80%;
        width: 60%;
        box-shadow: 0px 0px 24px #475570;
    }

    .screen__content {
        z-index: 1;
        position: relative;
        height: 100%;
    }

    .screen__background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 0;
        -webkit-clip-path: inset(0 0 0 0);
        clip-path: inset(0 0 0 0);
    }

    .screen__background__shape {
        transform: rotate(45deg);
        position: absolute;
    }

    .screen__background__shape1 {
        height: 90%;
        width: 90%;
        background: #FFF;
        top: -9%;
        right: 56%;
    }

    .screen__background__shape2 {
        height: 50%;
        width: 50%;
        background: #D3AC2B;
        top: -30%;
        right: 8.5%;
    }

    .screen__background__shape3 {
        height: 100%;
        width: 30%;
        background: linear-gradient(270deg, #333D51, #475570);
        top: -5%;
        right: 11%;
    }

    .screen__background__shape4 {
        height: 70%;
        width: 40%;
        background: #D3AC2B;
        top: 70%;
        right: 10%;
    }

    .login {
        width: 50%;
        padding: 10%;
        padding-top: 10%;
    }

    .login__field {
        padding: 20px 0px;
        position: relative;
    }

    .login__icon {
        position: absolute;
        top: 30px;
        color: #D3AC2B;
    }

    .login__input {
        border: none;
        border-bottom: 2px solid #D1D1D4;
        background: none;
        padding: 10px;
        padding-left: 24px;
        font-weight: 700;
        width: 75%;
        transition: .2s;
    }

    .login__input:active,
    .login__input:focus,
    .login__input:hover {
        outline: none;
        border-bottom-color: #D3AC2B;
    }

    .login__submit {
        background: #fff;
        font-size: 14px;
        margin-top: 30px;
        padding: 16px 20px;
        border-radius: 26px;
        border: 1px solid #D4D3E8;
        text-transform: uppercase;
        font-weight: 700;
        display: flex;
        align-items: center;
        width: 100%;
        color: #D3AC2B;
        box-shadow: 0px 2px 2px #D3AC2B;
        cursor: pointer;
        transition: .2s;
    }

    .login__submit:active,
    .login__submit:focus,
    .login__submit:hover {
        border-color: #D3AC2B;
        outline: none;
    }

    .button__icon {
        font-size: 24px;
        margin-left: auto;
        color: #D3AC2B;
    }

    .social-login {
        position: absolute;
        height: 140px;
        width: 160px;
        text-align: center;
        bottom: 0px;
        right: 0px;
        color: #fff;
    }

    .social-icons {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social-login__icon {
        padding: 20px 10px;
        color: #fff;
        text-decoration: none;
        text-shadow: 0px 0px 8px #D3AC2B;
    }

    .social-login__icon:hover {
        transform: scale(1.5);
    }

</style>