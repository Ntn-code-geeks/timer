@echo off
    cd "C:\xampp\" 
    start xampp_start.exe
    TIMEOUT 10 
    cd "C:\Program Files (x86)\Google\Chrome\Application" 
    start chrome.exe 127.0.0.1\timer
    exit