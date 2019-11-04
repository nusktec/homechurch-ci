/**
 * Created by revelation on 10/26/19.
 * Developer: rscbyte.com (RSC Byte Limited)
 * Email: nusktecsoft@gmail.com
 */
var vue = new Vue({
    el: '#app',
    data: {
        user: {},
        disabled: false,
        info: ""
    },
    methods: {
        btnLogin: loginNow
    }
});
//begin login in
function loginNow() {
    setProgress(vue, "Please wait...", true);
    var data = vue.$data.user;
    if (JsonSanitizer(data)) {
        axios.post(userApi.login, data, {headers: config.axiosHeaders})
            .then(function (res) {
                var resp = res.data;
                if (resp.status) {
                    //logged in
                    setProgress(vue, resp.msg, true);
                    setTimeout(function () {
                        window.location.href = baseUrl;
                    }, 3000)
                } else {
                    setProgress(vue, resp.msg, false);
                }
            })
            .catch(function (err) {
                setProgress(vue, "Unable to login at the moment...", false);
            })
    } else {
        setProgress(vue, "Check form fields and try again !", false);
    }
}