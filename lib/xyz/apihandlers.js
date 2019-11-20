/**
 * Created by revelation on 10/20/19.
 */
var baseUrl = "http://localhost/homechurch";
var ssk = "1eca978ca8ed19c46b10c26f8f309db70532e700";
const userApi = {
    create: baseUrl + "/api/user/create?ssk=" + ssk,
    login: baseUrl + "/api/user/login?ssk=" + ssk,
    reset: baseUrl + "/api/user/reset?ssk=" + ssk,
    resetlink: baseUrl + "/api/user/resetlink?ssk=" + ssk,
    updateDp: baseUrl + "/api/user/updatedp?ssk=" + ssk,
    updateInfo: baseUrl + "/api/user/updateinfo?ssk=" + ssk,
    
    //Messages api
    msg:{
        delete: baseUrl + "/api/user/delMsg?ssk=" + ssk,
        send: baseUrl + "/api/user/sendMsg?ssk=" + ssk,
        
    },
    //Testimony api
    tstm:{
        create: baseUrl + "/api/user/createTstm?ssk=" + ssk,
        delete: baseUrl + "/api/user/delTstm?ssk=" + ssk,

    },
    sh:{
        submitHome: baseUrl + "/api/user/submitHomeChurch?ssk=" + ssk,
        deleteHome: baseUrl + "/api/user/deleteHomeChurch?ssk=" + ssk,

    }
};

