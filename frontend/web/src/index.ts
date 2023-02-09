import App from "./App.svelte";

window.addEventListener('load', ()=>{
	const app = new App({target: document.body})
});

export {}