import 'package:flutter/material.dart';

void main() {
  runApp(const InvoiceOcrApp());
}

class InvoiceOcrApp extends StatelessWidget {
  const InvoiceOcrApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Invoice OCR Enterprise',
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.blue),
        useMaterial3: true,
      ),
      home: const Scaffold(
        body: Center(child: Text('Invoice OCR Enterprise')),
      ),
    );
  }
}
