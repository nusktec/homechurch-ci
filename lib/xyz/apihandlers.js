/**
 * Created by revelation on 10/20/19.
 */
var baseUrl = "http://localhost/homechurch";
var ssk = "1eca978ca8ed19c46b10c26f8f309db70532e700";
const userApi = {
    create: baseUrl + "/api/user/create?ssk=" + ssk,
    login: baseUrl + "/api/user/login?ssk=" + ssk,
    reset: baseUrl + "/api/user/reset?ssk=" + ssk,
};