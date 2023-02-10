import {writable} from 'svelte/store';

export default function (url: RequestInfo | URL){
    const loading = writable(false)
    const error = writable(false)
    const data = writable([])

    async function get(){
        loading.set(true);
        error.set(false)
        try{
            //@ts-ignore
            const response = await fetch(url);
            data.set(await response.json());
        }catch (e){
            error.set(true);
        }
        loading.set(false);
    }
    get();
    return [data, loading, error, get];
}