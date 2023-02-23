class counterFormData {
    private _active : boolean = false;
    private _date : string = "YYYY-MM-DD HH:MM:SS";


    get active(): boolean {
        return this._active;
    }

    set active(value: boolean) {
        this._active = value;
    }


    get date(): string {
        return this._date;
    }

    set date(value: string) {
        this._date = value;
    }
}
export default counterFormData;