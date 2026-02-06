import 'package:flutter/material.dart';

import '../../core/theme/app_theme.dart';

/// Footer with divider and link to alternate auth screen
class AuthFooter extends StatelessWidget {
  const AuthFooter({
    super.key,
    required this.promptText,
    required this.actionLabel,
    required this.onAction,
  });

  final String promptText;
  final String actionLabel;
  final VoidCallback onAction;

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        Row(
          children: [
            const Expanded(child: Divider(color: AppTheme.dividerColor)),
            Padding(
              padding: const EdgeInsets.symmetric(horizontal: 16),
              child: Text(
                'or',
                style: Theme.of(context).textTheme.bodyMedium,
              ),
            ),
            const Expanded(child: Divider(color: AppTheme.dividerColor)),
          ],
        ),
        const SizedBox(height: 24),
        Text(
          promptText,
          style: Theme.of(context).textTheme.bodyMedium,
          textAlign: TextAlign.center,
        ),
        const SizedBox(height: 8),
        TextButton(
          onPressed: onAction,
          child: Text(actionLabel),
        ),
      ],
    );
  }
}
