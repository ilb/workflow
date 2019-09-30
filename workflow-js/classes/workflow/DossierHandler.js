import config from '../../conf/config';
import { DossiersApi} from '@ilb/filedossier-api';

export default function DossierHandler() {

}


DossierHandler.getInitialProps = async function (params) {
    const {query, req} = params;
    const headers = req ? req.headers : {};
    const {dossierKey, dossierPackage, dossierCode} = query;

    const apiDossier = new DossiersApi(config.dossierApiClient(headers ? headers['x-remote-user'] : null));

    const dossierData = await apiDossier.getDossier(dossierKey, dossierPackage, dossierCode);
    // TODO FIXME добавить в бэк dossierKey, dossierPackage. убрать этот код
    dossierData.dossierKey = dossierKey;
    dossierData.dossierPackage = dossierPackage;
    return {dossierData};
};
