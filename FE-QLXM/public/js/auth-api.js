// Login/Auth API Functions
document.addEventListener('DOMContentLoaded', function () {
    // Auth specific functions
    window.authAPI = {
        // Login function
        login: async (email, password) => {
            try {
                const response = await window.axios.post('/login', {
                    email: email,
                    password: password
                });

                if (response.data.token) {
                    localStorage.setItem('auth_token', response.data.token);
                    localStorage.setItem('user', JSON.stringify(response.data.user));
                    return response.data;
                }
            } catch (error) {
                throw error;
            }
        },

        // Register function
        register: async (userData) => {
            try {
                const response = await window.axios.post('/register', userData);
                return response.data;
            } catch (error) {
                throw error;
            }
        },

        // Logout function
        logout: async () => {
            try {
                await window.axios.post('/logout');
                localStorage.removeItem('auth_token');
                localStorage.removeItem('user');
                window.location.href = '/login';
            } catch (error) {
                // Even if API call fails, clear local storage
                localStorage.removeItem('auth_token');
                localStorage.removeItem('user');
                window.location.href = '/login';
            }
        },

        // Check if user is authenticated
        isAuthenticated: () => {
            return localStorage.getItem('auth_token') !== null;
        },

        // Get current user
        getCurrentUser: () => {
            const userString = localStorage.getItem('user');
            return userString ? JSON.parse(userString) : null;
        }
    };

    // Enhanced login form handling
    const loginForm = document.querySelector('#loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            const email = document.querySelector('#email')?.value;
            const password = document.querySelector('#password')?.value;
            const submitBtn = document.querySelector('button[type="submit"]');
            const errorDiv = document.querySelector('#error-message');

            if (!email || !password) {
                showError('Vui lòng nhập đầy đủ email và mật khẩu');
                return;
            }

            // Show loading state
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang đăng nhập...';
            }

            try {
                const result = await window.authAPI.login(email, password);

                // Show success message
                showSuccess('Đăng nhập thành công! Đang chuyển hướng...');

                // Redirect based on user role
                setTimeout(() => {
                    if (result.user.role === 'admin') {
                        window.location.href = '/admin/dashboard';
                    } else {
                        window.location.href = '/';
                    }
                }, 1500);

            } catch (error) {
                console.error('Login error:', error);

                let errorMessage = 'Đăng nhập thất bại';
                if (error.response?.status === 401) {
                    errorMessage = 'Email hoặc mật khẩu không đúng';
                } else if (error.response?.status === 422) {
                    errorMessage = 'Dữ liệu không hợp lệ';
                } else if (error.message.includes('Network Error')) {
                    errorMessage = 'Lỗi kết nối. Vui lòng kiểm tra internet';
                }

                showError(errorMessage);
            } finally {
                // Reset button state
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<i class="fas fa-sign-in-alt"></i> Đăng nhập';
                }
            }
        });
    }

    // Helper functions for showing messages
    function showError(message) {
        const alertHtml = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle"></i> ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;

        const container = document.querySelector('.login-card');
        if (container) {
            // Remove existing alerts
            container.querySelectorAll('.alert').forEach(alert => alert.remove());
            // Add new alert
            container.insertAdjacentHTML('afterbegin', alertHtml);
        }
    }

    function showSuccess(message) {
        const alertHtml = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;

        const container = document.querySelector('.login-card');
        if (container) {
            // Remove existing alerts
            container.querySelectorAll('.alert').forEach(alert => alert.remove());
            // Add new alert
            container.insertAdjacentHTML('afterbegin', alertHtml);
        }
    }

    console.log('🔐 Auth API loaded');
});