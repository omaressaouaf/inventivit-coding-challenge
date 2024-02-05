import "./bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import { createApp } from "vue/dist/vue.esm-bundler";
import Calculator from "@/components/calculator.vue";

const app = createApp({});

app.component("calculator", Calculator);

app.mount("#calculator");
