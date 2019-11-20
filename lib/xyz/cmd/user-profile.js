/**
 * Created by revelation on 10/26/19.
 * Developer: rscbyte.com (RSC Byte Limited)
 * Email: nusktecsoft@gmail.com
 */
var vue = null;
loader();
function loader() {
    vue = new Vue({
        el: '#app',
        data: {user: user, disabled: false, info: "", imgInfo: "", imgdisabled: false},
        methods: {updateInfo: updateNow}
    })
}

//update user info
function updateNow() {
    var data = vue.$data.user;
    if (JsonSanitizer(data)) {
        setProgress(vue, "Updating....", true);
        axios.post(userApi.updateInfo, data)
            .then(function (res) {
                logs(res);
                if (res.data.status) {
                    setProgress(vue, "Updated !", false);
                } else {
                    setProgress(vue, "Updates failed...", false);
                }
            })
            .catch(function (err) {
                setProgress(vue, "Not updated", false);
            })
    }
    else {
        setProgress(vue, "Incomplete field(s)", false);
    }
}

//upload db
function fileshooter(id) {
    vue.$data.imgInfo = "Preparing...";
    var file = document.querySelector('#fileshooter').files[0];
    base64Img = getBase64(file, 512, function (b) {
       var msg = ''
        if (b === 1) {
           msg = "Image size is larger than expected";
            //image size is large
            $("#tstbody").html(msg);
            $('#toastme').addClass('bg-warning').toast('show');
            logs(msg);
            vue.$data.imgInfo = "Size too large";
            return;
        }
        if (b === 0) {
            msg = "Error uploading image";
            $("#tstbody").html(msg);
            $('#toastme').addClass('bg-warning').toast('show');
            logs(msg);
            vue.$data.imgInfo = "Bad image";
            return;
        }
        if (b !== 0 && b !== 1) {
//begin uploads
            NProgress.start();
            var data = {base64: b, uid: id};
            vue.$data.imgInfo = "Uploading...";
            vue.$data.imgdisabled = true;
            axios.post(userApi.updateDp, data, {headers: config.axiosHeaders})
                .then(function (res) {
                    logs(res);
                    if (res.data.status) {
                        //updated
                        NProgress.done();
                        vue.$data.imgInfo = "Updated";
                        vue.$data.imgdisabled = false;
                        
                    } else {
                        //image not uploaded
                        NProgress.done();
                        vue.$data.imgInfo = "Failed";
                        vue.$data.imgdisabled = false;
                    }
                })
                .catch(function (err) {
                    //error occur
                    logs(err);
                    NProgress.done();
                    vue.$data.imgInfo = "Failed";
                    vue.$data.imgdisabled = false;
                })
        }
    }); // prints the base64 string
}
