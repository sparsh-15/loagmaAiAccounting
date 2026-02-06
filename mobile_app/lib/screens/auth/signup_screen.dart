import 'package:flutter/material.dart';

import '../../core/theme/app_theme.dart';
import '../../shared/widgets/auth_button.dart';
import '../../shared/widgets/auth_form_field.dart';
import '../../shared/widgets/auth_footer.dart';
import '../../utils/validators.dart';

class SignupScreen extends StatefulWidget {
  const SignupScreen({super.key});

  @override
  State<SignupScreen> createState() => _SignupScreenState();
}

class _SignupScreenState extends State<SignupScreen> {
  final _formKey = GlobalKey<FormState>();
  final _nameController = TextEditingController();
  final _emailController = TextEditingController();
  final _passwordController = TextEditingController();
  final _confirmPasswordController = TextEditingController();

  bool _isLoading = false;

  Future<void> _signUp() async {
    if (!_formKey.currentState!.validate()) return;

    setState(() => _isLoading = true);

    // TODO: Call auth service
    await Future<void>.delayed(const Duration(seconds: 2));

    if (mounted) {
      setState(() => _isLoading = false);
    }
  }

  @override
  void dispose() {
    _nameController.dispose();
    _emailController.dispose();
    _passwordController.dispose();
    _confirmPasswordController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: AppTheme.backgroundColor,
      body: SafeArea(
        child: SingleChildScrollView(
          padding: const EdgeInsets.symmetric(horizontal: 24),
          child: Form(
            key: _formKey,
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: [
                const SizedBox(height: 48),

                Text(
                  'Invoice OCR',
                  style: Theme.of(context).textTheme.headlineMedium?.copyWith(
                        color: AppTheme.primaryColor,
                        fontWeight: FontWeight.w700,
                      ),
                  textAlign: TextAlign.center,
                ),
                const SizedBox(height: 8),
                Text(
                  'Create your account',
                  style: Theme.of(context).textTheme.bodyMedium,
                  textAlign: TextAlign.center,
                ),

                const SizedBox(height: 48),

                // Name
                TextFormField(
                  controller: _nameController,
                  textInputAction: TextInputAction.next,
                  textCapitalization: TextCapitalization.words,
                  decoration: const InputDecoration(
                    labelText: 'Full name',
                    hintText: 'Enter your name',
                    prefixIcon: Icon(Icons.person_outline),
                    prefixIconColor: AppTheme.textSecondary,
                  ),
                  validator: (v) => Validators.required(v, 'Name'),
                ),

                const SizedBox(height: 20),

                // Email
                AuthEmailField(
                  controller: _emailController,
                  textInputAction: TextInputAction.next,
                ),

                const SizedBox(height: 20),

                // Password
                AuthPasswordField(
                  controller: _passwordController,
                  labelText: 'Password',
                  hintText: 'Create a password (min 6 characters)',
                  textInputAction: TextInputAction.next,
                ),

                const SizedBox(height: 20),

                // Confirm Password
                AuthConfirmPasswordField(
                  controller: _confirmPasswordController,
                  passwordController: _passwordController,
                  textInputAction: TextInputAction.done,
                  onFieldSubmitted: (_) => _signUp(),
                ),

                const SizedBox(height: 24),

                AuthButton(
                  label: 'Create account',
                  isLoading: _isLoading,
                  onPressed: _signUp,
                ),

                const SizedBox(height: 24),

                AuthFooter(
                  promptText: 'Already have an account?',
                  actionLabel: 'Sign in',
                  onAction: () => Navigator.of(context).pop(),
                ),

                const SizedBox(height: 48),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
