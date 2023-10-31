<?php require_once("utilities.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <?php require "styles.php"; ?>
    <?php $horaActual = date("H:i:s"); ?>
</head>
<body>
    <?php require 'formulario.php'; ?>
    <div class="last-m">Última actualización: <?php echo getLastModification(__FILE__); ?></div>
    <div id="nos">
        <h2>Sobre VirtuCratix</h2>
        <table>
            <tr>
                <td colspan="2">Misión</td>
            </tr>
            <tr>
                <td><img src="img/imagen3.png" alt="Mision/Vision" width="400" height="300"></td>
                <td>Nuestra misión es impulsar el éxito de nuestros clientes a través de soluciones tecnológicas innovadoras. Nos comprometemos a brindar servicios y productos de desarrollo de software de la más alta calidad que satisfagan las necesidades específicas de cada cliente. Buscamos ser un socio estratégico en el crecimiento y la transformación digital de las empresas, aportando creatividad, experiencia y compromiso a cada proyecto. Nuestra misión se basa en los siguientes principios fundamentales:
                Excelencia técnica: Nos esforzamos por alcanzar la excelencia en el desarrollo de software, utilizando las últimas tecnologías y las mejores prácticas de la industria para entregar productos confiables y eficientes.
                Colaboración a largo plazo: Establecemos relaciones a largo plazo con nuestros clientes, trabajando codo a codo para comprender sus necesidades y metas, y proporcionando soluciones sostenibles que evolucionen con sus organizaciones.
                Innovación constante: Abrazamos la innovación como parte de nuestro ADN. Siempre estamos buscando formas nuevas y creativas de abordar los desafíos tecnológicos de nuestros clientes.
                Satisfacción del cliente: La satisfacción del cliente es nuestra prioridad número uno. Medimos nuestro éxito por el éxito de nuestros clientes y nos esforzamos por superar sus expectativas en cada proyecto.
                </td>
            </tr>
            <tr>
                <td colspan="2">Visión</td>
            </tr>
            <tr>
                <td>Nuestra visión es ser líderes en la industria de desarrollo de software, reconocidos por nuestra excelencia técnica, innovación constante y compromiso inquebrantable con la satisfacción del cliente. Queremos marcar la diferencia en el mundo de la tecnología a través de los siguientes aspectos clave:
                Liderazgo tecnológico: Nos esforzamos por estar a la vanguardia de las últimas tendencias tecnológicas y ser referentes en el desarrollo de software en todo el mundo.
                Impacto positivo: Buscamos crear soluciones que tengan un impacto positivo en la sociedad y en el mundo empresarial, contribuyendo al crecimiento y la eficiencia de las organizaciones.
                Crecimiento sostenible: Nos esforzamos por lograr un crecimiento constante y sostenible, expandiendo nuestro alcance y nuestro impacto, sin comprometer la calidad de nuestros servicios.
                Cultura de aprendizaje: Fomentamos una cultura de aprendizaje continuo, donde nuestros empleados tienen la oportunidad de crecer y desarrollarse profesionalmente, y donde la innovación es bienvenida.
                Reconocimiento global: Queremos ser reconocidos a nivel mundial como una empresa líder en el desarrollo de software, y ser el socio de confianza para empresas de todos los tamaños en sus proyectos tecnológicos.
                </td>
                <td><img src="img/imagen1.jpg" alt="Nuestra Oficina" width="400" height="300"></td>
            </tr>
            <tr>
                <td colspan="2">Contrataciones</td>
            </tr>
            <tr>
                <td><img src="img/imagen2.jpg" alt="Nuestro Equipo" width="400" height="300"></td>
                <td>Si estás interesado en unirse a nuestro equipo o colaborar en un proyecto, aquí hay algunos requisitos clave que debes tener en cuenta:
                    Habilidades técnicas: Buscamos profesionales con habilidades sólidas en programación y desarrollo de software. La experiencia en lenguajes de programación relevantes y tecnologías específicas es un plus.
                    Pasión por la tecnología: Valoramos a las personas que tienen un genuino interés y pasión por la tecnología y la innovación.
                    Comunicación y colaboración: La comunicación efectiva y la capacidad para trabajar en equipo son fundamentales en nuestro entorno de trabajo.
                    Experiencia previa: Dependiendo del cargo, la experiencia previa en proyectos de desarrollo de software puede ser un requisito.
                    Educación: Valoramos la educación relacionada con la informática, como títulos en ciencias de la computación o campos afines.
                    Si estás interesado en unirse a nuestro equipo o si deseas trabajar con nosotros en un proyecto, te animamos a ponerte en contacto con nuestro departamento de recursos humanos o ventas para obtener más información sobre las oportunidades actuales.
                </td>
            </tr>
        </table>
    </div>
    <?php require 'footer.php'?>
</body>
</html>
