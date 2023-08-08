const path = require('path')
const {defineConfig} = require('@vue/cli-service')
module.exports = defineConfig({
    transpileDependencies: true,
    css: {
        extract: false,
        loaderOptions: {
            less: {
                lessOptions: {
                    javascriptEnabled: true,
                }
            }
        }
    },
    runtimeCompiler: true,
    outputDir: path.resolve(__dirname, 'assets/components')
})
