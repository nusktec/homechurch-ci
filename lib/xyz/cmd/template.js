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