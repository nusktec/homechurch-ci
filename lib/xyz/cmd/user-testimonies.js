/**
 * Created by revelation on 10/26/19.
 * Developer: eclatsoft (RSC Byte Limited)
 * Email: daraxdray86@gmail.com
 */

var vue = null;
loader();
function loader() {
    vue = new Vue({
        el: '#app',
        data: {
            otherTestimony: [],
            show: {},
            viewT: false,
            user: user,
            tstm: tstm,
            api_msg: '',
            disabled: false,
            info: "hello",
            imgInfo: "",
            imgdisabled: false,
            tags: '',
            tstmInfo: {
                title: 'New Test',
                summary: 'Summary',
                desc: 'The description goes here',
                tags: ''

            }
        },
        computed: {
            stringToArray(str) {
                this.tags = str.split(',')

            }
        },
        methods: {
            useApi: useApi,
            createTestimony() {
                this.useApi('create', userApi.tstm.create, this.tstmInfo)

            },
            delTestimony(tid) {

                this.useApi('delete', userApi.tstm.delete, tid)
            },
            islogged: islogged,
            setView(tid) {
                this.viewT = true,
                    this.otherViews(tid)
                this.show = this.tstm.filter((t) => {
                    return t.tid == tid
                })
            },
            otherViews(tid) {
                this.otherTestimony = this.tstm.filter((t) => {
                    return t.tid != tid
                })

            }

        },
        mounted() {

        },
        filters: {
            timeago: timeago,
            firststr: firststr,
            custom_substr, custom_substr,
            dateConv: dateConv,

        }

    })
}


//CREATE TESTIMONY

function useApi(action, apiUrl, api_data) {

    setProgress(vue, "Please wait...", true);

    if (api_data) {
        axios.post(apiUrl, api_data, { headers: config.axiosHeaders })
            .then((res) => {
                var resp = res.data;
                if (resp.status) {
                    //deleted in
                    setProgress(vue, resp.msg, true);
                    vue.$data.api_msg = "Testimony" + action + "d Succesfully";
                    
                    $('#toastme').toast('show');
                    setTimeout(function () {
                        window.location.href = baseUrl + '/user/testimonies';
                    }, 3000)

                } else {
                    
                    $('#toastme').addClass('bg-warning').toast('show')
                    setProgress(vue, resp.msg, false);
                    console.log('response error' + resp)
                }
            },
                (err) => console.log(err))
            .catch(function (err) {
                $('#toastme').addClass('bg-danger').toast('show')
                console.log('catched error')
                setProgress(vue, "Unable to delete at the moment...", false);
            })
    } else {
        console.log('no form data avaiable')
        setProgress(vue, "Check form fields and try again !", false);
    }
}
