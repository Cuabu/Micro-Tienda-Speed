import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Speed Store',
      home: Scaffold(
        floatingActionButton: Text("Nuevo Usuario"),
        appBar: AppBar(
          title: Text("INGRESE DE USARIOS"),
        ),
        body: Text("BIENVENID@"),
      ),
    );
  }
}
