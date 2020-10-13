import Http from '../http-common'

class CategoryDataService {
    getAll() {
        return Http.get('/category');
    }

    create(data) {
        return Http.post('/category', data);
    }

    delete(id) {
        return Http.delete(`/category/${id}`);
    }
}

export default new CategoryDataService();
