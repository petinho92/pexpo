import type StudentFormData from "src/pages/registration/data/studentFormData";
import handleFetch from "./handle-fetch";
import {active} from "./store";


export function hirundinidae(input: StudentFormData){
    fetch('/post/studentPost', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(input)
    }).then(function (response) {
        handleFetch(response);
        //  active = false;
        if(response.ok){
            return active.set(true);
        }
    })
}


