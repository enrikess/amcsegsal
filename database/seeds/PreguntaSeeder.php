<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lineamiento = DB::table('lineamientos')->select('id')->where(['codigo'=>'principios'])->first();


        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador proporciona los recursos necesarios para que se implemente un sistema de gestión de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se ha cumplido lo planificado en los diferentes programas de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se implementan acciones preventivas de seguridad y salud en el trabajo para asegurar la mejora continua.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se reconoce el desempeño del trabajador para mejorar la autoestima y se fomenta el trabajo en equipo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se realizan actividades para fomentar una cultura de prevención de riesgos del trabajo en toda la empresa, entidad pública o privada.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se promueve un buen clima laboral para reforzar la empatía entre empleador y trabajador y viceversa.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Existen medios que permiten el aporte de los trabajadores al empleador en materia de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Existen mecanismos de reconocimiento del personal proactivo interesado en el mejoramiento continuo de la seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se tiene evaluado los principales riesgos que ocasionan mayores pérdidas.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se fomenta la participación de los representantes de trabajadores y de las organizaciones sindicales en las decisiones sobre la seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);






        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'2'])->first();


        DB::table('preguntas')->insert([
            'descripcion' => 'Existe una política documentada en materia de seguridad y salud en el trabajo, específica y apropiada para la empresa, entidad pública o privada.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La política de seguridad y salud en el trabajo está firmada por la máxima autoridad de la empresa, entidad pública o privada.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Los trabajadores conocen y están comprometidos con lo establecido en la política de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Su contenido comprende :</br>
            - El compromiso de protección de todos los miembros de la organización. </br>
            - Cumplimiento de la normatividad.</br>
            - Garantía de protección, participación, consulta y participación en los elementos del sistema de gestión de seguridad y salud en el trabajo por parte de los trabajadores y sus representantes.</br>
            - La mejora continua en materia de seguridad y salud en el trabajo</br>
            - Integración del Sistema de Gestión de Seguridad y Salud en el Trabajo con otros sistemas de ser el caso.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'3'])->first();


        DB::table('preguntas')->insert([
            'descripcion' => 'Se toman decisiones en base al análisis de inspecciones, auditorias, informes de investigación de accidentes, informe de estadísticas,  avances de programas de seguridad y salud en el trabajo y opiniones de trabajadores, dando el seguimiento de las mismas.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador delega funciones y autoridad al personal encargado de implementar el sistema de gestión de Seguridad y Salud en el Trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'4'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador asume el liderazgo  en la gestión de la seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador dispone los recursos necesarios para mejorar la gestión de la seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'5'])->first();


        DB::table('preguntas')->insert([
            'descripcion' => 'Existen responsabilidades específicas en seguridad y salud en el trabajo de los niveles de mando de la empresa, entidad pública o privada.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se ha destinado presupuesto para implementar o mejorar el sistema de gestión de seguridad y salud el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El Comité o Supervisor de Seguridad y Salud en el Trabajo participa en la definición de estímulos y sanciones.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'6'])->first();


        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador ha definido los requisitos de competencia necesarios para cada puesto de trabajo y adopta disposiciones de capacitación en materia de seguridad y salud en el trabajo para que éste asuma sus deberes con responsabilidad. ',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'7'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'Se ha realizado una evaluación inicial o estudio de línea base como diagnóstico participativo del estado de la salud y seguridad en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Los resultados han sido comparados con lo establecido en la Ley de SST y su Reglamento y otros dispositivos legales pertinentes, y servirán de base para planificar, aplicar el sistema y como referencia para medir su mejora continua.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La planificación permite:<br>
                - Cumplir con normas nacionales<br>
                - Mejorar el desempeño<br>
                - Mantener procesos productivos seguros o de servicios seguros.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'8'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador ha establecido procedimientos para identificar peligros y evaluar riesgos.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Comprende estos procedimientos:<br>
            - Todas las actividades<br>
            - Todo el personal<br>
            - Todas las instalaciones',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador aplica medidas para: <br>
            - Gestionar, eliminar y controlar riesgos.<br>
            - Diseñar ambiente y puesto de trabajo, seleccionar equipos y métodos de trabajo que garanticen la seguridad y salud del trabajador.<br>
            - Eliminar las situaciones y agentes peligrosos o sustituirlos.<br>
            - Modernizar los planes y programas de prevención de riesgos laborales.<br>
            - Mantener políticas de protección.<br>
            - Capacitar anticipadamente al trabajador.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador actualiza la evaluación de riesgo una  (01) vez al año como mínimo o cuando cambien las condiciones o se hayan producido daños.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La evaluación de riesgo considera:<br>
            - Controles periódicos de las condiciones de trabajo y de la salud de los trabajadores.<br>
            - Medidas de prevención.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Los representantes de los trabajadores han participado en la identificación de peligros y evaluación de riesgos, han sugerido las medidas de control y verificado su aplicación.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'9'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'Los objetivos se centran en el logro de resultados realistas y posibles de aplicar, que comprende:<br>
            -         Reducción de los riesgos del trabajo.<br>
            -         Reducción de los accidentes de trabajo y enfermedades ocupacionales.<br>
            -         La mejora continua de los procesos, la gestión del cambio, la preparación y respuesta a situaciones de emergencia.<br>
            -         Definición de metas, indicadores, responsabilidades.<br>
            -         Selección de criterios de medición para confirmar su logro.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La empresa, entidad pública o privada cuenta con objetivos cuantificables de seguridad y salud en el trabajo que abarca a todos los niveles de la organización y están documentados.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'10'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'Existe un programa anual de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Las actividades programadas están relacionadas con el logro de los objetivos.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se definen responsables de las actividades en el programa de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se definen tiempos y plazos para el cumplimiento y se realiza seguimiento periódico.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se señala dotación de recursos humanos y económicos',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se establecen actividades preventivas ante los riesgos que inciden en la función de procreación del trabajador.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'11'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'El Comité de Seguridad y Salud en el Trabajo está constituido de forma paritaria. (Para el caso de empleadores con 20 o más trabajadores).',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Existe al menos un Supervisor de Seguridad y Salud (para el caso de empleadores con menos de 20 trabajadores). ',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador es responsable de:<br>
            - Garantizar la seguridad y salud de los trabajadores.<br>
            - Actúa para mejorar el nivel de seguridad y salud en el trabajo.<br>
            - Actúa en tomar medidas de prevención de riesgo ante modificaciones de las condiciones de trabajo.<br>
            - Realiza los exámenes médicos ocupacionales al trabajador antes, durante y al término de la relación laboral.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador considera las competencias del trabajador en materia de seguridad y salud en el trabajo, al asignarle sus labores.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador controla que solo el personal capacitado y protegido acceda a zonas de alto riesgo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador prevé que la exposición a agentes físicos, químicos, biológicos, disergonómicos y psicosociales no generen daño al trabajador o trabajadora.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador asume los costos de las acciones de seguridad y salud ejecutadas en el centro de trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'12'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador toma medidas para transmitir al trabajador información sobre los riesgos en el centro de trabajo y las medidas de protección que corresponda.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador imparte la capacitación dentro de la jornada de trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El costo de las capacitaciones es íntegramente asumido por el empleador.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Los representantes de los trabajadores han revisado el programa de capacitación.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La capacitación se imparte por personal competente y con experiencia en la materia.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se ha capacitado a los integrantes del comité de seguridad y salud en el trabajo o al supervisor de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Las capacitaciones están documentadas.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se han realizado capacitaciones de seguridad y salud en el trabajo: <br>
            - Al momento de la contratación, cualquiera sea la modalidad o duración.<br>
            - Durante el desempeño de la labor.<br>
            - Específica en el puesto de trabajo o en la función que cada trabajador desempeña, cualquiera que sea la naturaleza del vínculo, modalidad o duración de su contrato.<br>
            - Cuando se produce cambios en las funciones que desempeña el trabajador.<br>
            - Cuando se produce cambios en las tecnologías o en los equipos de trabajo.<br>
            - En las medidas que permitan la adaptación a la evolución de los riesgos y la prevención de nuevos riesgos.<br>
            - Para la actualización periódica de los conocimientos.<br>
            - Utilización y mantenimiento preventivo de las maquinarias y equipos.<br>
            - Uso apropiado de los materiales peligrosos.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'13'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'Las medidas de prevención y protección se aplican en el orden de prioridad:<br>
            - Eliminación de los peligros y riesgos.<br>
            - Tratamiento, control o aislamiento de los peligros y riesgos, adoptando medidas técnicas o administrativas.<br>
            - Minimizar los peligros y riesgos, adoptando sistemas de trabajo seguro que incluyan disposiciones administrativas de control.<br>
            - Programar la sustitución progresiva y en la brevedad posible, de los procedimientos, técnicas, medios, sustancias y productos peligrosos por aquellos que produzcan un menor riesgo o ningún riesgo para el trabajador.<br>
            - En último caso, facilitar equipos de protección personal adecuados, asegurándose que los trabajadores los utilicen y conserven en forma correcta. <br>',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'14'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'La empresa, entidad pública o privada ha elaborado planes y procedimientos para enfrentar y responder ante situaciones de emergencias.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se tiene organizada la brigada para actuar en caso de: incendios, primeros auxilios, evacuación.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La empresa, entidad pública o privada revisa los planes y procedimientos ante situaciones de emergencias en forma periódica. ',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador ha dado las instrucciones a los trabajadores para que en caso de un peligro grave e inminente puedan interrumpir sus labores y/o evacuar la zona de riesgo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'15'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador que asume el contrato principal en cuyas instalaciones desarrollan actividades, trabajadores de contratistas, subcontratistas, empresas especiales de servicios y cooperativas de trabajadores, garantiza:<br>
            - La coordinación de la gestión en prevención de riesgos laborales.<br>
            - La seguridad y salud de los trabajadores.<br>
            - La verificación de la contratación de los seguros de acuerdo a ley por cada empleador.<br>
            - La vigilancia del cumplimiento de la normatividad en materia de seguridad y salud en el trabajo por parte de la empresa, entidad pública o privada que destacan su personal.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Todos los trabajadores tienen el mismo nivel de protección en materia de seguridad y salud en el trabajo sea que tengan vínculo laboral con el empleador o con contratistas, subcontratistas, empresa especiales de servicios o cooperativas de trabajadores.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'16'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'Los trabajadores han participado en:<br>
            - La consulta, información y capacitación en seguridad y salud en el trabajo.<br>
            - La elección de sus representantes ante el Comité de seguridad y salud en el trabajo<br>
            - La conformación del Comité de seguridad y salud en el trabajo.<br>
            - El reconocimiento de sus representantes por parte del empleador.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Los trabajadores han sido consultados ante los cambios realizados en las operaciones, procesos y organización del trabajo que repercuta en su seguridad y salud.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Existe procedimientos para asegurar que las informaciones pertinentes lleguen a los trabajadores correspondientes de la organización',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'17'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'La empresa, entidad pública o privada tiene un procedimiento para identificar, acceder y monitorear el cumplimiento de la normatividad aplicable al sistema de gestión de seguridad y salud en el trabajo y se mantiene actualizada.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La empresa, entidad pública o privada con 20 o más trabajadores ha elaborado su Reglamento Interno de Seguridad y Salud en el Trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La empresa, entidad pública o privada con 20 o más trabajadores tiene un Libro del Comité de Seguridad y Salud en el Trabajo (Salvo que una norma sectorial no establezca un número mínimo inferior).',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Los equipos a presión que posee la empresa entidad pública o privada tienen su libro de servicio autorizado por el MTPE.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador adopta las medidas necesarias y oportunas, cuando detecta que la utilización de ropas y/o equipos de trabajo o de protección personal representan riesgos específicos para la seguridad y salud de los trabajadores.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador toma medidas que eviten las labores peligrosas a trabajadoras en periodo de embarazo o lactancia conforme a ley.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador no emplea a niños, ni adolescentes en actividades peligrosas.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador evalúa el puesto de trabajo que va a desempeñar un adolescente trabajador previamente a su incorporación laboral a fin de determinar la naturaleza, el grado y la duración de la exposición al riesgo, con el objeto de adoptar medidas preventivas necesarias.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La empresa, entidad pública o privada dispondrá lo necesario para que:<br>
            - Las máquinas, equipos, sustancias, productos o útiles de trabajo no constituyan una fuente de peligro.<br>
            - Se proporcione información y capacitación sobre la instalación, adecuada utilización y mantenimiento preventivo de las maquinarias y equipos.<br>
            - Se proporcione información y capacitación para el uso apropiado de los materiales peligrosos.<br>
            - Las instrucciones, manuales, avisos de peligro u otras medidas de precaución colocadas en los equipos y maquinarias estén traducido al castellano.<br>
            - Las informaciones relativas a las máquinas, equipos, productos, sustancias o útiles de trabajo son comprensibles para los trabajadores.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Los trabajadores cumplen con:<br>
            - Las normas, reglamentos e instrucciones de los programas de seguridad y salud en el trabajo que se apliquen en el lugar de trabajo y con las instrucciones que les impartan sus superiores jerárquicos directos.<br>
            - Usar adecuadamente los instrumentos y materiales de trabajo, así como los equipos de protección personal y colectiva.<br>
            - No operar o manipular equipos, maquinarias, herramientas u otros elementos para los cuales no hayan sido autorizados y, en caso de ser necesario, capacitados.<br>
            - Cooperar y participar en el proceso de investigación de los accidentes de trabajo, incidentes peligrosos, otros incidentes y las enfermedades ocupacionales cuando la autoridad competente lo requiera.<br>
            - Velar por el cuidado integral individual y colectivo, de su salud física y mental.<br>
            - Someterse a exámenes médicos obligatorios <br>
            - Participar en los organismos paritarios de seguridad y salud en el trabajo.<br>
            - Comunicar al empleador situaciones que ponga o pueda poner en riesgo su seguridad y salud y/o las instalaciones físicas<br>
            - Reportar a los representantes de seguridad de forma inmediata, la ocurrencia de cualquier accidente de trabajo, incidente peligroso o incidente.<br>
            - Concurrir a la capacitación y entrenamiento sobre seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'18'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'La vigilancia y control de la seguridad y salud en el trabajo permite evaluar con regularidad los resultados logrados en materia de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La supervisión permite:<br>
            - Identificar las fallas o deficiencias en el sistema de gestión de la seguridad y salud en el trabajo.<br>
            - Adoptar las medidas preventivas y correctivas.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El monitoreo permite la medición cuantitativa y cualitativa apropiadas.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se monitorea el grado de cumplimiento de los objetivos de la seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'19'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador realiza exámenes médicos antes, durante y al término de la relación laboral a los trabajadores (incluyendo a los adolescentes).',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Los trabajadores son informados: <br>
                - A título grupal, de las razones para los exámenes de salud ocupacional.<br>
                - A título personal, sobre los resultados de los informes médicos relativos a la evaluación de su salud.<br>
                - Los resultados de los exámenes médicos no son pasibles de uso para ejercer discriminación.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Los resultados de los exámenes médicos son considerados para tomar acciones preventivas o correctivas al respecto.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'20'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador notifica al Ministerio de Trabajo y Promoción del Empleo los accidentes de trabajo mortales dentro de las 24 horas de ocurridos.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador notifica al Ministerio de Trabajo y Promoción del Empleo, dentro de las 24 horas de producidos, los incidentes peligrosos que han puesto en riesgo la salud y la integridad física de los trabajadores y/o a la población.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se implementan las medidas correctivas propuestas en los registros de accidentes de trabajo, incidentes peligrosos y otros incidentes.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se implementan las medidas correctivas producto de la no conformidad hallada en las auditorías de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se implementan medidas preventivas de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'21'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador ha realizado las investigaciones de accidentes de trabajo, enfermedades ocupacionales e incidentes peligrosos, y ha comunicado a la autoridad administrativa de trabajo, indicando las medidas correctivas y preventivas adoptadas.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se investiga los accidentes de trabajo, enfermedades ocupacionales e incidentes peligrosos para:<br>
            - Determinar las causas e implementar las medidas correctivas.<br>
            - Comprobar la eficacia de las medidas de seguridad y salud vigentes al momento de hecho.<br>
            - Determinar la  necesidad modificar dichas medidas.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se toma medidas correctivas  para reducir las consecuencias de accidentes.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Se ha documentado los cambios en los procedimientos como consecuencia de las acciones correctivas.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El trabajador ha sido transferido en caso de accidente de trabajo o enfermedad ocupacional a otro puesto que implique menos riesgo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'22'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'La empresa, entidad pública o privada ha identificado las operaciones y actividades que están asociadas con riesgos donde las medidas de control necesitan ser aplicadas.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La empresa, entidad pública o privada ha establecido procedimientos para el diseño del lugar de trabajo, procesos operativos, instalaciones, maquinarias y organización del trabajo que incluye la adaptación a las capacidades humanas a modo de reducir los riesgos en sus fuentes.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'23'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'Se ha evaluado las medidas de seguridad debido a cambios internos, método de trabajo, estructura organizativa y cambios externos normativos, conocimientos en el campo de la seguridad, cambios tecnológicos, adaptándose las medidas de prevención antes de introducirlos.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'24'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'Se cuenta con un programa de auditorías.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador realiza auditorías internas periódicas para comprobar la adecuada aplicación del sistema de gestión de la seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Las auditorías externas son realizadas por auditores independientes con la participación de los trabajadores o sus representantes.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Los resultados de las auditorías son comunicados a la alta dirección de la empresa, entidad pública o privada.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'25'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'La empresa, entidad pública o privada establece y mantiene información en medios apropiados para describir los componentes del sistema de gestión y su relación entre ellos.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Los procedimientos de la empresa, entidad pública o privada, en la gestión de la seguridad y salud en el trabajo, se revisan periódicamente.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador establece y mantiene disposiciones y procedimientos para:<br>
            - Recibir, documentar y responder adecuadamente a las comunicaciones internas y externas relativas a la seguridad y salud en el trabajo.<br>
            - Garantizar la comunicación interna de la información relativa a la seguridad y salud en el trabajo entre los distintos niveles y cargos de la organización.<br>
            - Garantizar que las sugerencias de los trabajadores o de sus representantes sobre seguridad y salud en el trabajo se reciban y atiendan en forma oportuna y adecuada',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador entrega adjunto a los contratos de trabajo las recomendaciones de seguridad y salud considerando los riesgos del centro de labores y los relacionados con el puesto o función del trabajador.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador ha:<br>
            - Facilitado al trabajador una copia del reglamento interno de seguridad y salud en el trabajo.<br>
            - Capacitado al trabajador en referencia al contenido del reglamento interno de seguridad.<br>
            - Asegurado poner en práctica las medidas de seguridad y salud en el trabajo.<br>
            - Elaborado un mapa de riesgos del centro de trabajo y lo exhibe en un lugar visible.<br>
            - El empleador entrega al trabajador las recomendaciones de seguridad y salud en el trabajo considerando los riesgos del centro de labores y los relacionados con el puesto o función, el primer día de labores.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador mantiene procedimientos para garantizan que:<br>
            - Se identifiquen, evalúen e incorporen en las especificaciones relativas a compras y arrendamiento financiero, disposiciones relativas al cumplimiento por parte de la organización de los requisitos de seguridad y salud.<br>
            - Se identifiquen las obligaciones y los requisitos tanto legales como de la propia organización en materia de seguridad y salud en el trabajo antes de la adquisición de bienes y servicios.<br>
            - Se adopten disposiciones para que se cumplan dichos requisitos antes de utilizar los bienes y servicios mencionados.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'26'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'La empresa, entidad pública o privada establece procedimientos para el control de los documentos que se generen por esta lista de verificación.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Este control asegura que los documentos y datos:<br>
            - Puedan ser fácilmente localizados.<br>
            - Puedan ser analizados y verificados periódicamente.<br>
            - Están disponibles en los locales.<br>
            - Sean removidos cuando los datos sean obsoletos.<br>
            - Sean adecuadamente archivados.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'27'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador ha implementado registros y documentos del sistema de gestión actualizados y a disposición del trabajador referido a:<br>
            - Registro de accidentes de trabajo,  enfermedades ocupacionales, incidentes peligrosos y otros incidentes, en el que deben constar la investigación y las medidas correctivas.<br>
            - Registro de exámenes médicos ocupacionales.<br>
            - Registro del monitoreo de agentes físicos, químicos, biológicos, psicosociales y factores de riesgo disergonómicos.<br>
            - Registro de inspecciones internas de seguridad y salud en el trabajo.<br>
            - Registro de estadísticas de seguridad y salud.<br>
            - Registro de equipos de seguridad o emergencia.<br>
            - Registro de inducción, capacitación, entrenamiento y simulacros de emergencia.<br>
            - Registro de auditorías.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La empresa, entidad pública o privada cuenta con registro de accidente de trabajo y enfermedad ocupacional e incidentes peligrosos y otros incidentes ocurridos a:<br>
            - Sus trabajadores.<br>
            - Trabajadores de intermediación laboral y/o tercerización.<br>
            - Beneficiarios bajo modalidades formativas.<br>
            - Personal que presta servicios de manera independiente, desarrollando sus actividades total o parcialmente en las instalaciones de la empresa, entidad pública o privada.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Los registros mencionados son:<br>
            - Legibles e identificables.<br>
            - Permite su seguimiento.<br>
            - Son archivados y adecuadamente protegidos.',
            'lineamiento_id' => $lineamiento->id
        ]);

        $lineamiento = DB::table('lineamientos')->select('id')->where(['id'=>'28'])->first();

        DB::table('preguntas')->insert([
            'descripcion' => 'La alta dirección: <br>
            Revisa y analiza periódicamente el sistema de gestión para asegurar que es apropiada y efectiva.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'Las disposiciones adoptadas por la dirección para la mejora continua del sistema de gestión de la seguridad y salud en el trabajo, deben tener en cuenta:<br>
            - Los objetivos de la seguridad y salud en el trabajo de la empresa, entidad pública o privada.<br>
            - Los resultados de la identificación de los peligros y evaluación de los riesgos.<br>
            - Los resultados de la supervisión y medición de la eficiencia.<br>
            - La investigación de accidentes, enfermedades ocupacionales, incidentes peligrosos y otros incidentes relacionados con el trabajo.<br>
            - Los resultados y recomendaciones de las auditorías y evaluaciones realizadas por la dirección de la empresa, entidad pública o privada.<br>
            - Las recomendaciones del Comité de seguridad y salud, o del Supervisor de seguridad y salud.<br>
            - Los cambios en las normas.<br>
            - La información pertinente nueva.<br>
            - Los resultados de los programas anuales de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La metodología de mejoramiento continuo considera:<br>
            - La identificación de las desviaciones de las prácticas y condiciones aceptadas como seguras.<br>
            - El establecimiento de estándares de seguridad.<br>
            - La medición y evaluación periódica del desempeño con respecto a los estándares de la empresa, entidad pública o privada.<br>
            - La corrección y reconocimiento del desempeño.',
            'lineamiento_id' => $lineamiento->id
        ]);

        DB::table('preguntas')->insert([
            'descripcion' => 'La investigación y auditorías permiten a la dirección de la empresa, entidad pública o privada lograr los fines previstos y determinar, de ser el caso, cambios en la política y objetivos del sistema de gestión de seguridad y salud en el trabajo.',
            'lineamiento_id' => $lineamiento->id
        ]);


        DB::table('preguntas')->insert([
            'descripcion' => 'La investigación de los accidentes, enfermedades ocupacionales, incidentes peligrosos y otros incidentes, permite identificar:<br>
                - Las causas inmediatas (actos y condiciones subestándares), <br>
                - Las causas básicas (factores personales y factores del trabajo) <br>
                - Deficiencia del sistema de gestión de la seguridad y salud en el trabajo, para la planificación de la acción correctiva pertinente.',
            'lineamiento_id' => $lineamiento->id
        ]);


        DB::table('preguntas')->insert([
            'descripcion' => 'El empleador ha modificado las medidas de prevención de riesgos laborales cuando resulten inadecuadas e insuficientes para garantizar la seguridad y salud de los trabajadores incluyendo al personal de los regímenes de intermediación y tercerización, modalidad formativa e incluso a los que prestan servicios de manera independiente, siempre que éstos desarrollen sus actividades total o parcialmente en las instalaciones de  la empresa, entidad pública o privada durante el desarrollo de las operaciones.',
            'lineamiento_id' => $lineamiento->id
        ]);





    }
}
