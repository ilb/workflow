import React, { Suspense, useState, useEffect, useRef } from 'react';
import { Table, Button, Message, Loader } from 'semantic-ui-react';
import { DossiersApi} from '@ilb/filedossier-api';
import config from '../../conf/config';

export default function Dossier(dossier) {
    const {dossierKey, dossierPackage, dossierCode} = dossier;

    return (
            <div style={{marginTop: '30px'}} className="fileDosser">
                <div>
                    <div className="ui dividing header" style={{width: '100%'}}>{dossier.name}</div>
                    {dossier.dossierFile &&
                            <Table celled>
                                <Table.Header>
                                    <Table.Row>
                                        <Table.HeaderCell>Файл</Table.HeaderCell>
                                        <Table.HeaderCell>Управление</Table.HeaderCell>
                                    </Table.Row>
                                </Table.Header>
                                <Table.Body>
                                    {dossier.dossierFile.map(file => (
                                                            <DossierFile
                                                                key={file.code}
                                                                file={file}
                                                                link={getDownloadLink(dossier, file.code)}
                                                                dossier={dossier}
                                                                // onChange={getDossier}
                                                                // resource={dossierResource(file.code)}
                                                                />
                                                                        ))}
                            </Table.Body>
                        </Table>
                }
            </div>
            </div>
            );
}
function getDownloadLink(dossier, fileCode) {
    return 'https://devel.net.ilb.ru/workflow-web/web/v2' + '/dossiers/' + dossier.dossierKey + '/' + dossier.dossierPackage + '/' + dossier.code + '/dossierfiles/' + fileCode;
}


function DossierFile( { file: { code, name, exists, readonly }, file, onChange, resource, link, dossier }) {
    const {dossierKey, dossierPackage, dossierCode} = dossier;
    //FIXME
    const headers = null;
    const api = new DossiersApi(config.dossierApiClient(headers ? headers['x-remote-user'] : null));

    const inputFileEl = useRef(null);
    const [error, setError] = useState(null);

    const remove = () => {
        // onChange();
    };

    const upload = async () => {
        console.log('upload', code, inputFileEl.current.files);

//        const formData = new FormData();
//
//        for (var i = 0; i < files.length; i++) {
//            formData.append(i, files.item(i));
//        }

        const fileCode = file.code;
        const opts = {file: inputFileEl.current.files[0]};
        console.log('inputFileEl', inputFileEl);
        try {
            const uploadAwait = await api.uploadContents(fileCode, dossierKey, dossierPackage, dossierCode, opts);
            // await api.uploadContents(fileCode, dossierKey, dossierPackage, dossierCode, opts);
            console.log('uploadAwait', uploadAwait);
        } catch (err) {
            setError('ошибка');
            console.log('err!!!', err);
        }
        // resource.uploadContents(inputFileEl.current.files[0]);
        // onChange();
    };


    return (
            <Table.Row>
                <Table.Cell>
                    {exists && <a href={link}>{name}</a>}
                    {!exists && name }
                </Table.Cell>
                <Table.Cell>
                    {!readonly && <div>
                        <Button content="Удалить" onClick={remove}/>
                        <input ref={inputFileEl} type="file" name="file" onChange={upload}/>
                    </div>}
                    {error && <Message error visible header='Ошибка при загрузке файла' content={error} />}
                </Table.Cell>
            </Table.Row>
            );
}



