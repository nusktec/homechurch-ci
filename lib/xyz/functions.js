/**
 * Created by revelation on 10/20/19.
 */
//global configurations
const config = {
    axiosHeaders: {
        'X-Requested-With': 'XMLHttpRequest',
        'Content-type': 'application/json'
    }
};

//top bar progress bar
NProgress.configure({showSpinner: false, minimum: 0.5});
NProgress.set(0.5);
NProgress.start(); //start top progress bar
setTimeout(function () {
    NProgress.done();
}, 500);

//json filter
function JsonSanitizer(data) {
    var filtered = [];
    if (typeof (data) === "object" && data != null) {
        //if is empty return early
        if (Object.keys(data).length < 1) {
            return false;
        }
        //iterate
        for (var key in data) {
            if (data.hasOwnProperty(key) && ((!/^\s*$/.test(data[key])))) {
                filtered.push(true);
            } else {
                filtered.push(false);
            }
        }
    } else {
        return false;
    }
    //finalized
    return !filtered.includes(false);
}

//progress setter
var clearText;
function setProgress(vue, msg, load) {
    if (load) {
        vue.$data.disabled = load;
        NProgress.start();
        vue.$data.info = msg;
        clearTimeout(clearText);
    } else {
        clearTimeout(clearText);
        NProgress.done();
        vue.$data.disabled = load;
        vue.$data.info = msg;
        clearText = setTimeout(function () {
            vue.$data.info = "";
        }, 8000);
    }
}

//logout
function logs(data) {
    console.log(data);
}