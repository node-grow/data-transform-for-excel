import {App, AsyncComponentLoader, Component} from "vue";

declare global {
    interface Window {
        $app: App,
        $container: {
            register: (name: string, loader: AsyncComponentLoader | Component) => void,
            get: (name: string) => Promise<any>
        }
    }
}
