<script lang="ts">
    import '@fortawesome/fontawesome-free/js/fontawesome.js';
    import '@fortawesome/fontawesome-free/js/brands.js';
    import '@fortawesome/fontawesome-free/js/regular.js';
    import '@fortawesome/fontawesome-free/js/solid.js';
    import 'bulma/css/bulma.min.css';
    import 'bulma-extensions';
    import Router from "svelte-spa-router";
    import routes from "src/application/router/routes";
</script>

<Router {routes}/>

<style lang="scss" global>
  body{
    background-color: #00e7eb;
  }

  </style>