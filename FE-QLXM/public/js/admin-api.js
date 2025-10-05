// Admin API Helper Functions
document.addEventListener('DOMContentLoaded', function () {
    // Admin specific API functions
    window.adminAPI = {
        // User Management
        getUsers: (page = 1) => window.api.get(`/admin/users?page=${page}`),
        createUser: (userData) => window.api.post('/admin/users', userData),
        updateUser: (id, userData) => window.api.put(`/admin/users/${id}`, userData),
        deleteUser: (id) => window.api.delete(`/admin/users/${id}`),

        // Product Management
        getProducts: (page = 1) => window.api.get(`/admin/products?page=${page}`),
        createProduct: (productData) => window.api.post('/admin/products', productData),
        updateProduct: (id, productData) => window.api.put(`/admin/products/${id}`, productData),
        deleteProduct: (id) => window.api.delete(`/admin/products/${id}`),

        // Category Management
        getCategories: () => window.api.get('/admin/categories'),
        createCategory: (categoryData) => window.api.post('/admin/categories', categoryData),
        updateCategory: (id, categoryData) => window.api.put(`/admin/categories/${id}`, categoryData),
        deleteCategory: (id) => window.api.delete(`/admin/categories/${id}`),

        // Brand Management
        getBrands: () => window.api.get('/admin/brands'),
        createBrand: (brandData) => window.api.post('/admin/brands', brandData),
        updateBrand: (id, brandData) => window.api.put(`/admin/brands/${id}`, brandData),
        deleteBrand: (id) => window.api.delete(`/admin/brands/${id}`),

        // Order Management
        getOrders: (page = 1) => window.api.get(`/admin/orders?page=${page}`),
        updateOrderStatus: (id, status) => window.api.put(`/admin/orders/${id}/status`, { status }),
        getOrderDetails: (id) => window.api.get(`/admin/orders/${id}`),

        // Dashboard Stats
        getDashboardStats: () => window.api.get('/admin/dashboard/stats'),
        getSalesChart: (period = 'month') => window.api.get(`/admin/dashboard/sales?period=${period}`),

        // File Upload
        uploadImage: (file, type = 'product') => {
            const formData = new FormData();
            formData.append('image', file);
            formData.append('type', type);

            return window.axios.post('/admin/upload', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
        }
    };

    // Helper functions for common admin operations
    window.adminHelpers = {
        // Show loading state
        showLoading: (elementId) => {
            const element = document.getElementById(elementId);
            if (element) {
                element.innerHTML = '<div class="text-center"><i class="bi bi-hourglass-split"></i> Đang tải...</div>';
            }
        },

        // Show success message
        showSuccess: (message) => {
            const alertHtml = `
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            document.querySelector('.content-wrapper')?.insertAdjacentHTML('afterbegin', alertHtml);
        },

        // Show error message
        showError: (message) => {
            const alertHtml = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle"></i> ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            document.querySelector('.content-wrapper')?.insertAdjacentHTML('afterbegin', alertHtml);
        },

        // Confirm delete action
        confirmDelete: (itemName, callback) => {
            if (confirm(`Bạn có chắc chắn muốn xóa "${itemName}"? Hành động này không thể hoàn tác.`)) {
                callback();
            }
        },

        // Format currency
        formatCurrency: (amount) => {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(amount);
        },

        // Format date
        formatDate: (dateString) => {
            return new Date(dateString).toLocaleDateString('vi-VN');
        }
    };

    console.log('🔧 Admin API helpers loaded');
});