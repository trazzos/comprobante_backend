export default async function companiesGetApi() {
    try {
        return await axios.get('/api/company', { params: { uuid: 'test' } });
    } catch(error) {
        //ilos.growl.failAxios(error);
        throw new Error(error);
    }
}
