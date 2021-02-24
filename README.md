## Cores intermediárias nos espaços de cores RGB, HSL e HSV

Um script em PHP com uma classe para o cálculo dos valores RGB/HSL/HSV das n cores intermediárias, determinando uma escala de cor, uma paleta, entre as duas cores dadas.

### Algoritmo

Para n cores intermediárias, com i variando de 1 à n, o valor de cada cor intermediária entre a e b, é dado pela equação:

V = a + (b - a) * i / (n + 1)

Observações:

1. Nos espaços de cores HSL e HSV, a matiz é numericamente ordenada em um círculo de 360°, o qual permite uma continuidade do deslocamento do 360° ao 0°. Deste modo, a escala intermediária pode naturalmente transpor o fim dos 360 graus, tornando-se o grau zero, para dar continuidade na sequência. Diferentemente da escala do espaço RGB, a qual é uma reta finita 0-255, onde a equação acima serve sem adaptações.

2. As funções para HSL e HSV adotam a menor circunferência, a menor distância entre a e b, como percurso da escala de cor.

:point_right: O exemplo do uso desta classe utiliza também a classe que foi publicada em [Conversão de espaço de cores RGB-HSL-HSV](https://github.com/danmadeira/conversao-rgb-hsl)

### Exemplo de uma paleta

O gráfico da projeção de 11 cores intermediárias, entre o magenta e o amarelo, para cada espaço de cor:

![Paleta de Cores](img/paleta.png?raw=true)

### Espaços de cor

O espaço de cor red/green/blue, ou, vermelho/verde/azul, é um sistema de colorimetria para dimensionar uma cor pela combinação das quantidades destas três cores primárias. Cada cor primária tem um valor o qual pode variar em uma escala de zero (completamente enegrecida) à 255 (completamente pura). As cores primárias são aditivas, quando todas as cores estão no 0, o resultado é preto, quando todas estão em 255, o resultado é branco, e quando todos os valores forem iguais, o resultado é cinza.

O espaço de cor hue/saturation/lightness, ou, matiz/saturação/brilho, é um sistema de colorimetria para dimensionar uma cor por estas três propriedades. No HSL, o matiz é a cor pura numericamente ordenada em um círculo de cores de 360°. A saturação é o grau de pureza da cor pela mesclagem do matiz com a cor cinza, em uma escala de 0% (cinza) à 100% (pura). O brilho é a claridade da cor graduada do completamente enegrecido em 0% ao completamente embranquecido em 100%, deste modo, a cor pura está em 50% do brilho.

O espaço de cor hue/saturation/value, ou, matiz/saturação/valor, é um sistema de colorimetria para dimensionar uma cor por estas três propriedades. No HSV, o matiz é a cor pura numericamente ordenada em um círculo de cores de 360°. A saturação é o grau de pureza da cor pela mesclagem do matiz com a cor branca, em uma escala de 0% (branco) à 100% (pura). O valor é a claridade da cor graduada do completamente enegrecido em 0% ao completamente puro em 100%, deste modo, a cor pura está em 100% do valor.

### Referências

- FORD, A.; ROBERTS, A. *Colour Space Conversions*. August 11, 1998. Disponível em: <http://poynton.ca/PDFs/coloureq.pdf>

- IBRAHEEM, N. A.; HASAN, M. M.; KHAN, R. Z.; MISHRA, P. K. *Understanding Color Models: A Review*. ARPN Journal of Science and Technology. vol. 2, no. 3, pp. 265-275. April 2012.

- MALACARA, D. *Color Vision and Colorimetry: Theory and Applications, 2nd ed*. SPIE. Bellingham, Washington, USA, 2011.

- SCHANDA, J. *Colorimetry: Understanding the CIE System*. Wiley, 2007.

- SHEVELL, S. K. *The Science of Color, Second Edition*. Optical Society of America. Elsevier, 2003.

- SMITH, A. R. *Color Gamut Transform Pairs*. Technical Memo No 7, Computer Graphics Lab, New York Institute of Technology, Jul 1978, issued as tutorial notes at SIGGRAPHs 78-82. Disponível em: <http://alvyray.com/Papers/CG/color78.pdf>

- WALDMAN, N. *Math behind colorspace conversions, RGB-HSL*. May 8, 2013. Disponível em: <http://www.niwa.nu/2013/05/math-behind-colorspace-conversions-rgb-hsl/>

- WARE, C. *Information Visualization: Perception for Design, Fourth Edition*. Morgan Kaufmann, Elsevier, 2021.
