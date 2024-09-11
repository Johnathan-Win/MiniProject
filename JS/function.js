import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

// Function to trigger success alert
export function showSuccessAlert() {
    Swal.fire({
        title: 'Login Successful',
        text: 'Welcome back!',
        icon: 'success',
        confirmButtonText: 'OK'
    });
}

// Function to trigger error alert
export function showErrorAlert() {
    Swal.fire({
        title: 'Login Failed',
        text: 'Invalid email or password. Please try again.',
        icon: 'error',
        confirmButtonText: 'OK'
    });
}