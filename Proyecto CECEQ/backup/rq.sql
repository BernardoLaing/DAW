select
v.nombre as 'name',
v.apellidoPaterno as 'paternal',
v.apellidoMaterno as 'maternal',
v.fechaNacimiento as 'birth',
v.genero as 'gender',

gnom as 'schooling',

c.fechaExpedicion as 'issuance',
c.foto as 'fileToUpload',
c.colonia as 'neighborhood',
c.calle as 'street',
c.numero as 'number',
c.cp as 'postalCode',
c.telefono as 'phone',
c.correo as 'email',
c.nombreTrabajo as 'workName',
c.telefonoTrabajo as 'workPhone',
c.coloniaTrabajo as 'workNeighborhood',
c.calleTrabajo as 'workStreet',
c.numeroTrabajo as 'workNumber',
c.cpTrabajo as 'workPostalCode',

f.nombre as 'nameF',
f.apellidoPaterno as 'paternalF',
f.apellidoMaterno as 'maternalF',
f.colonia as 'neighborhoodF',
f.calle as 'streetF',
f.numero as 'numberF',
f.cp as 'postalCodeF',
f.telefono as 'phoneF',
f.correo as 'emailF',
f.nombreTrabajo as 'workNameF',
f.telefonoTrabajo as 'workPhoneF',
f.coloniaTrabajo as 'workNeighborhoodF',
f.calleTrabajo as 'workStreetF',
f.numeroTrabajo as 'workNumberF',
f.cpTrabajo as 'workPostalCodeF',

fgnom as 'schoolingF'



from
visitante v,
(

  select vg.idVisitante as vid, g.nombre as gnom
  from
    (
    select idVisitante as ii, max(fecha) as im
    from visitante_gradoestudios
    group by idVisitante
    ) i, visitante_gradoestudios vg, gradoestudios g
  where i.ii = vg.idVisitante and i.im = vg.fecha and vg.idGrado = g.idGrado

) as vg,
credencial c,
credencial_fiador cf,
fiador f,
(
    select g.nombre as fgnom, f.idFiador as fid
    from
    fiador f,
    fiador_gradoestudios fg,
    gradoestudios g
    where
    f.idFiador = fg.idFiador and
    fg.idGrado = g.idGrado

) fg,
(
select idVisitante as idvc, max(fechaExpedicion) as mfc
from credencial
group by idVisitante
) ic,
(
select idCredencial as eidc, idFiador as eidf
from credencial_fiador icf,
    (
    select idCredencial as idc, max(fecha) imfc
    from credencial_fiador
    group by idCredencial
    ) ic
where icf.idCredencial = ic.idc and
icf.fecha = ic.imfc
) scuc


where

-- nombre del grado de estudios
v.idVisitante = vid and

-- agregar credencial
v.idVisitante = c.idVisitante and

-- credencial más reciente
c.idVisitante = ic.idvc and
c.fechaExpedicion = mfc and

-- fiador más reciente
c.idCredencial = cf.idCredencial and
(cf.idCredencial, cf.idFiador) = (scuc.eidc, scuc.eidf) and

-- añadir nombre del grado de estudios del fiador
cf.idFiador = f.idFiador and
f.idFiador = fid;
































update visitante
set
nombre = ?,
apelldoPaterno = ?,
apellidoMaterno = ?,
fechaNacimiento = ?,
genero = ?
where idVisitante = ?;









select
v.nombre as 'name',
v.apellidoPaterno as 'paternal',
v.apellidoMaterno as 'maternal',
v.fechaNacimiento as 'birth',
v.genero as 'gender',

gnom as 'schooling',

c.fechaExpedicion as 'issuance',
c.foto as 'fileToUpload',
c.colonia as 'neighborhood',
c.calle as 'street',
c.numero as 'number',
c.cp as 'postalCode',
c.telefono as 'phone',
c.correo as 'email',
c.nombreTrabajo as 'workName',
c.telefonoTrabajo as 'workPhone',
c.coloniaTrabajo as 'workNeighborhood',
c.calleTrabajo as 'workStreet',
c.numeroTrabajo as 'workNumber',
c.cpTrabajo as 'workPostalCode',

f.nombre as 'nameF',
f.apellidoPaterno as 'paternalF',
f.apellidoMaterno as 'maternalF',
f.colonia as 'neighborhoodF',
f.calle as 'streetF',
f.numero as 'numberF',
f.cp as 'postalCodeF',
f.telefono as 'phoneF',
f.correo as 'emailF',
f.nombreTrabajo as 'workNameF',
f.telefonoTrabajo as 'workPhoneF',
f.coloniaTrabajo as 'workNeighborhoodF',
f.calleTrabajo as 'workStreetF',
f.numeroTrabajo as 'workNumberF',
f.cpTrabajo as 'workPostalCodeF',

fgnom as 'schoolingF'



from
visitante v,
(
    select g.nombre as gnom, v.idVisitante as vid
    from
    visitante v,
    visitante_gradoestudios vg,
    gradoestudios g
    where
    v.idVisitante = vg.idVisitante and
    vg.idGrado = g.idGrado
) as vg,
credencial c,
credencial_fiador cf,
fiador f,
(
    select g.nombre as fgnom, f.idFiador as fid
    from
    fiador f,
    fiador_gradoestudios fg,
    gradoestudios g
    where
    f.idFiador = fg.idFiador and
    fg.idGrado = g.idGrado
) fg

where
v.idVisitante = vid and
v.idVisitante = c.idVisitante and
c.idCredencial = cf.idCredencial and
cf.idFiador = f.idFiador and
f.idFiador = fid;