class StudentFormData {

    private _name : String = "";
    private _neptun : String = "";
    private _email : String = "";
    private _major : String = "";
    private _semester : String = "";
    private _mobile : String = "";
    private _programs : Array<number> = [];
    private _lang : String = "";


    get lang(): String {
        return this._lang;
    }

    set lang(value: String) {
        this._lang = value;
    }

    get name(): String {
        return this._name;
    }

    set name(value: String) {
        this._name = value;
    }

    get neptun(): String {
        return this._neptun;
    }

    set neptun(value: String) {
        this._neptun = value;
    }

    get email(): String {
        return this._email;
    }

    set email(value: String) {
        this._email = value;
    }


    get major(): String {
        return this._major;
    }

    set major(value: String) {
        this._major = value;
    }

    get semester(): String {
        return this._semester;
    }

    set semester(value: String) {
        this._semester = value;
    }

    get mobile(): String {
        return this._mobile;
    }

    set mobile(value: String) {
        this._mobile = value;
    }

    get programs(): Array<number> {
        return this._programs;
    }

    set programs(value: Array<number>) {
        this._programs = value;
    }
}
export default StudentFormData;