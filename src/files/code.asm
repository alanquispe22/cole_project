page 60,132 ;60 lineas y 132 columnas por pagina
;nombre del programa:
title P04ASM1 Estructura de un programa .EXE

;a continuacion definimos los segmentos de pila,datos,codigo
;-------------------------------------
STACKSG segment para stack 'stack'
STACKSG ends
;-------------------------------------
DATASG SEGMENT PARA 'Data'  
    presiona db 10,13,"Press any key...$" 
    msjInd db "Ingresa un numero entre 1-9:",10,13,"$"     
    msjErr db "Error bx es diferente de cero",10,13,"$"     
    msj db "Hola Assembler",10,13,"$"     
DATASG ENDS
;-------------------------------------
CODESG segment para 'Code'
    
    BEGIN proc far    ;se define proc 'Begin'
        
        ;requisitos comunes de inicializacion de un prog .EXE        
        ;assume asocia los segmentos a los registros(ss, ds, cs son registros)
        assume ss:stacksg,ds:datasg,cs:codesg
        
        ;carga el ds con la direccion del segmento de datos     
        ;no se puede mover datos directamente de memoria a un registro de segmentos 
        mov ax,datasg ;obt direccion de segment de datos
        mov ds,ax     ;Almacena direccion en DS  
        ;----------------MyCode----------------  
        ;mov bx,31h
        ;mov dx,bx
        ;mov ah,2
        ;int 21h
        
        cmp bx,00;compara bx con cero
        jz b50;si es cero salta a b50
        lea dx,msjErr
        mov ah,9
        int 21h
        jmp salida                
              
        b50:lea dx,msjInd
        mov ah,9
        int 21h
        
        mov ah,01h
        int 21h
        sub al,30h 
        mov cl,al
        mov ah,02
        mov dx,10
        int 21h
        mov dx,13
        int 21h
        etiqueta:
        lea dx,msj
        mov ah,9
        int 21h
        dec cx;son equivalentes al
        JNZ etiqueta;loop
        
        ;-------------------------------------                
        salida:lea dx,presiona
        mov ah,9
        int 21h  ;  ds:dx direccion de la cadena a mostrar 
        
        ;espera a que se presione tecla
        mov ah,0
        int 16h    
        
        ;requisitos comunes de finalizacion de un prog .EXE
        mov ax,4c00h    ;peticion de finalizacion  ==ah,4ch
        int 21h ;regresa al DOS
        
    BEGIN ENDP
 CODESG ENDS
END begin    ;fin del programa, begin significa q es el pto de entrada