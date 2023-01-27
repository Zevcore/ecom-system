import axios from "axios";

const axiosClient = axios.create({
    baseURL: `${window.location.protocol}//${window.location.hostname}:8080/api/`,
    responseType: "json",
    headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
    },
});

export default {
    helpGet: (url) => axiosClient.get(url).then((res) => res.data),
    helpPost: (url, data) => axiosClient.post(url, data).then((res) => res.data),
    helpPatch: (url, data) =>
        axiosClient.patch(url, data).then((res) => res.data),
    helpPut: (url, data) =>
        axiosClient.put(url, data).then((res) => res.data),
    helpDelete: (url) => axiosClient.delete(url),
};
