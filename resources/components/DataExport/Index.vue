<template>
    <Spin :spinning="disabled">
        <Button type="primary" @click="onClick">{{ title }}</Button>
    </Spin>
</template>

<script setup lang="ts">
import {Button, Spin} from "ant-design-vue";
import ExcelJS from "exceljs";
import FileSaver from "file-saver";
import {ref} from "vue";
import {AxiosInstance} from "axios";

const {option, instance} = defineProps<{
    option: {
        title: string,
        data_url: string,
        file_name?: string,
    },
    instance: {
        http: AxiosInstance
    },
}>()

const disabled = ref(false)
const title = ref(option.title)

option.file_name = option.file_name || "数据导出.xlsx"

const fillDataToSheet = async (sheet: any, page: number) => {
    let url = option.data_url
    url += url.indexOf('?') !== -1 ? '&' : '?'
    url += 'page=' + page
    const res = await instance.http.get(url)

    if (!res.data.data?.length) {
        return
    }
    if (!sheet.columns?.length) {
        sheet.columns = Object.keys(res.data.data[0]).map(key => ({
            header: key,
            key,
        }))
    }
    res.data.data.map(item => {
        sheet.addRow(item)
    })
    title.value = ((page - 1) * res.data.per_page + res.data.data.length) + ' 条数据'

    await fillDataToSheet(sheet, page + 1)
}

const onClick = async () => {
    title.value = '导出中'
    // 创建工作簿
    const _workbook = new ExcelJS.Workbook();
    // 添加工作表
    const _sheet1 = _workbook.addWorksheet("sheet1");

    disabled.value = true

    await fillDataToSheet(_sheet1, 1)

    title.value = '生成文件中'
    // 导出表格
    _workbook.xlsx.writeBuffer().then((buffer) => {
        let _file = new Blob([buffer], {
            type: "application/octet-stream",
        });
        FileSaver.saveAs(_file, option.file_name);

        title.value = option.title
        disabled.value = false
    });
}
</script>

<style scoped lang="less">

</style>
