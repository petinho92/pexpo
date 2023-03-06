import type StudentFormData from "src/pages/registration/data/studentFormData";
import handleFetch from "./handle-fetch";
import {active} from "./store";


export function hirundinidae(input: StudentFormData){
    console.log(input)
    fetch('/student/save', {
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
            console.log("response ok");
            //ideiglenes
            return active.set(false);
        }
    })
}


