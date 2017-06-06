<?php

use Illuminate\Database\Seeder;

class BeneficiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array (
			array('empresa_id'=>1, 'descripcion'=>'Gratis manicure por un corte y cepillado', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>2, 'descripcion'=>'Gratis hidratación facial de oro por la compra de una limpieza facial profunda', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>3, 'descripcion'=>'50% de descuento en cita de diagnóstico', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>3, 'descripcion'=>'10% de descuento en servicios varios', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>4, 'descripcion'=>'10% de descuento en servicios y productos (cheque o efectivo)', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>4, 'descripcion'=>'5% de descuento en servicios y productos (tarjeta de débito o crédito)', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>5, 'descripcion'=>'12% de Descuento con la presentación de la tarjeta', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>6, 'descripcion'=>'10% de descuento en efectivo', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>6, 'descripcion'=>' 5% de descuento con tarjetas de crédito', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>7, 'descripcion'=>'Por la compra de una Pizza Master (20 porciones) o pizza familiar, gratis dos ingredientes adicionales. * No aplica con otras promociones*', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>8, 'descripcion'=>'2 Pizzas familiares por $19.99', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>9, 'descripcion'=>'15% de descuento en la compra de tortas de dulce enteras', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>9, 'descripcion'=>'15% de descuento en pedidos de más de $50,00', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>10, 'descripcion'=>'Postre de cortesía en cada compra', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>11, 'descripcion'=>'Celebra tu cumpleaños con un postre gratis ', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>11, 'descripcion'=>'Por el consumo de no menos de 5 platos, todos los invitados tendrán una (1) bebida soft gratis', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>12, 'descripcion'=>'Por la compra de 3 blusas, la 4ta es Gratis', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>13, 'descripcion'=>'20% de Descuento en toda la mercadería', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>14, 'descripcion'=>'15% Descuento en arreglos florales', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>15, 'descripcion'=>'10% Descuento en compras y cursos', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>16, 'descripcion'=>'Una clase de golf de cortesía. El único reqiusito es reservar clase con 24 horas de anticipación a: sergiomurtinho@hotmail.com.', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>17, 'descripcion'=>'1 Green Beer de cortesía con cerveza club o pilsener', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>17, 'descripcion'=>'3x2 en waffles o pancakes los sábados o domingos', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>18, 'descripcion'=>'40% Descuento para jugar 6 personas en cualquiera de los juegos disponibles de lunes a jueves.', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>19, 'descripcion'=>'', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>20, 'descripcion'=>'Tarifa Regular: Gratis la matrícula + 1 semana de regalo', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>20, 'descripcion'=>'Tarifa Trimestral: Gratis la matrícula + 3 semanas de regalo', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>20, 'descripcion'=>'Tarifa Semestral: Gratis la matrícula + 2 meses de regalo', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>20, 'descripcion'=>'Tarifa Anual: Gratis la matrícula + 3 meses de regalo', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>21, 'descripcion'=>'Por 2 meses de entrenamiento recibe 3', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>22, 'descripcion'=>'10% Descuento con todas las formas de pago', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>23, 'descripcion'=>'Por 8 clases recibe 10', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>23, 'descripcion'=>' Por 12 clases recibe 14', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>24, 'descripcion'=>'20% Descuento del precio de los cursos para una sesión. Exclusivo para nuevos estudiantes', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>25, 'descripcion'=>'Matricula gratis en cualquier carrera o curso', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>26, 'descripcion'=>'Por cada hospedaje (1 noche) que reserves con nosotros GRATIS el Desayuno para 1 persona', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>27, 'descripcion'=>'Por la compra de 1 sesión fotográfica GRATIS 2 Ampliaciones 8R', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>28, 'descripcion'=>'1 Mica de vidrio templado gratis por la compra de display + 5% descuento en display de iPhone y Sony Xperia ', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>28, 'descripcion'=>'3 días gratis en la compra de chip internacional para EE.UU., Puerto Rico y Hawái', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>29, 'descripcion'=>'La 4ta llanta es GRATIS. Pagos con tarjeta de crédito diferidos hasta 6 meses sin intereses', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>29, 'descripcion'=>'10% Decuento en productos y servicios', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>30, 'descripcion'=>'40% Descuento en todos los procedimientos odontológicos con cualquier forma de pago', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>31, 'descripcion'=>'10% Descuento en hospitalización, quirófano y cuidados intensivos en la clínica principal y alborada', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>32, 'descripcion'=>'Consulta General y Consulta Especialista $10. ', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>32, 'descripcion'=>'Consulta Dermatología $30. ', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>32, 'descripcion'=>'Ecos Electros y RX, laboratorio, procedimientos, odontología básica, procedimiento odontológico y estética con láser 20% descuento. ', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>32, 'descripcion'=>'Gratis primera consulta de odontología', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>33, 'descripcion'=>'Blanqueamiento dental + Profilaxis $69', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>33, 'descripcion'=>'Consulta de Ginecología + Ecografía de Mamas + Ecografía Transvaginal $60', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>33, 'descripcion'=>'Consulta + Exámenes de laboratorio: Biometría Hemática y Bioquímica: colesterol, triglicéridos, glucosa y creatinina $39', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('empresa_id'=>33, 'descripcion'=>'Ecografía 5D + Consulta $65', 'created_at'=>Carbon\Carbon::now()->todatetimestring(), 'updated_at'=>Carbon\Carbon::now()->todatetimestring())
		);
		
		DB::table('beneficios')->insert($data);
    }
}
